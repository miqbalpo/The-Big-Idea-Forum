<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\OtpEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginmo(Request $request)
    {
        try {
            // Validasi input (opsional jika ingin diaktifkan)
            // $request->validate([
            //     'email' => 'required|email',
            //     'password' => 'required',
            // ]);

            // Cari user berdasarkan email atau username
            $user = User::where('email', $request->email)
                        ->orWhere('name', $request->email)
                        ->first();

            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'The provided credentials are incorrect.'
                ], 401);
            }

            // VERIFIKASI PASSWORD YANG AMAN
            // Cek jika password masih plain text (belum di-hash)
            if ($request->password === $user->password) {
                // Jika password match sebagai plain text, hash password dan update
                $user->update([
                    'password' => Hash::make($request->password)
                ]);
            } 
            // Cek jika password sudah di-hash dengan Bcrypt
            else if (Hash::check($request->password, $user->password)) {
                // Password valid dengan Bcrypt
            }
            // Cek jika password di-hash dengan algoritma lain
            else if (md5($request->password) === $user->password) {
                // Jika menggunakan MD5, update ke Bcrypt
                $user->update([
                    'password' => Hash::make($request->password)
                ]);
            }
            else {
                return response()->json([
                    'status' => false,
                    'message' => 'The provided credentials are incorrect.'
                ], 401);
            }

            // Buat token API baru untuk user
            $token = $user->createToken('api-token')->plainTextToken;

            // HAPUS JSON FLAGS - ini penyebab masalah
            return response()->json([
                'status' => true,
                'message' => 'Login successful',
                'data' => [
                    'user' => $user->only(['id', 'name', 'email']),
                    'token' => $token,
                    'token_type' => 'Bearer'
                ],
            ], 200, [
                'Content-Type' => 'application/json; charset=utf-8'
            ]); // Hapus parameter ke-3 dan ke-4

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An error occurred during login.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    public function registermo(Request $request)
    {
        $errors = [];

        // Cek manual apakah email atau username sudah ada
        if (User::where('email', $request->email)->exists()) {
            $errors['email'] = ['Email ini sudah digunakan oleh akun lain'];
        }

        if (User::where('name', $request->name)->exists()) {
            $errors['username'] = ['Username ini sudah digunakan oleh akun lain'];
        }

        if (!empty($errors)) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $errors
            ], 422);
        }

        // Validasi input registrasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);
        
        // Buat user baru di database
        // dd('Endpoint terpanggil!', $request->all());
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Buat token API untuk user baru
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Registration successful',
            'data' => [
                'user' => $user->only(['id', 'name', 'email']),
                'token' => $token,
            ],
        ], 201);
    }

    public function logoutmo(Request $request)
    {
        // Hapus token akses saat ini (logout)
        $request->user()->currentAccessToken()->delete();
        
        return response()->json([
            'status' => true,
            'message' => 'Logged out successfully'
        ]);
    }

    public function usermo(Request $request)
    {
        // Kembalikan data user yang sedang login
        return response()->json([
            'status' => true,
            'data' => $request->user(),
        ]);
    }

    public function login(Request $request)
    {
        // Validasi input login web
        $request->validate([
            'email' => 'required|string',
            'password' => 'required',
        ]);

        // Cari user
        $user = User::where('email', $request->email)
                    ->orWhere('name', $request->email)
                    ->first();
        
        // Cek password dan login session jika valid
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->route('admin.index'); // pastikan route 'setting' ada
        }

        return back()->withErrors([
            'email' => 'The provided credentials are incorrect.',
        ]);
    }


    public function register(Request $request)
    {
        // Cek duplikasi email/username untuk feedback form
        $emailExists = User::where('email', $request->email)->exists();
        $usernameExists = User::where('name', $request->username)->exists();

        if ($emailExists || $usernameExists) {
            return back()->withErrors([
                'email' => $emailExists ? 'Email ini sudah digunakan oleh akun lain' : null,
                'username' => $usernameExists ? 'Username ini sudah digunakan oleh akun lain' : null,
            ])->withInput();
        }

        // dd('masuk register');
        // Validasi dan buat user baru
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirmpassword' => 'required|min:8|same:password',
        ]);

        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // dd($user);

        // Auth::login($user);

        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        // Logout session web
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // Kirim OTP
    public function sendOtp(Request $request)
    {
        // Validasi email harus ada di database
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        // Generate OTP 6 digit
        $otpCode = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $expiryTime = 1; // menit

        // Simpan OTP ke table password_reset_tokens
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => Hash::make($otpCode),
                'created_at' => Carbon::now(),
                'expires_at' => Carbon::now()->addMinutes($expiryTime),
                'verified_at' => null,
            ]
        );

        // Kirim email OTP
        try {
            Mail::to($user->email)->send(new OtpEmail($user, $otpCode, $expiryTime));
            
            // Response untuk API (Postman)
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Kode OTP telah dikirim ke email Anda.',
                    'email' => $user->email,
                    'otp_code' => $otpCode, // Hanya untuk testing, hapus di production
                ]);
            }
            
            // Response untuk Web
            return redirect()->route('otp')->with([
                'success' => 'Kode OTP telah dikirim ke email Anda.',
                'email' => $request->email
            ]);
            
        } catch (\Exception $e) {
            // Response untuk API (Postman)
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal mengirim OTP. Silakan coba lagi.',
                ], 500);
            }
            
            // Response untuk Web
            return back()->with('error', 'Gagal mengirim OTP. Silakan coba lagi.');
        }
    }

    // Fungsi untuk kirim ulang OTP
    public function resendOtp(Request $request)
    {
        // Validasi email
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // dd('masuk resend otp', $request->all());

        $user = User::where('email', $request->email)->first();

        // Generate OTP baru
        $otpCode = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $expiryTime = 10; // menit

        // Update OTP di database
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => Hash::make($otpCode),
                'created_at' => Carbon::now(),
                'expires_at' => Carbon::now()->addMinutes($expiryTime),
                'verified_at' => null,
            ]
        );

        // Kirim email OTP
        try {
            Mail::to($user->email)->send(new OtpEmail($user, $otpCode, $expiryTime));
            
            // Response untuk API (Postman)
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Kode OTP baru telah dikirim ke email Anda.',
                    'email' => $user->email,
                    'otp_code' => $otpCode, // Hanya untuk testing, hapus di production
                ]);
            }
            
            // Response untuk Web
            return back()->with('success', 'Kode OTP baru telah dikirim ke email Anda.');
            
        } catch (\Exception $e) {
            // Response untuk API (Postman)
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal mengirim ulang OTP. Silakan coba lagi.',
                ], 500);
            }
            
            // Response untuk Web
            return back()->with('error', 'Gagal mengirim ulang OTP. Silakan coba lagi.');
        }
    }

    // Verifikasi OTP dengan form
    public function verifyOtp(Request $request)
    {
        // dd('masuk verify otp', $request->all());
        // Validasi input OTP
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp_code' => 'required|digits:6',
        ]);

        // Ambil record token dari database
        $tokenRecord = DB::table('password_reset_tokens')
                        ->where('email', $request->email)
                        ->first();

        if (!$tokenRecord) {
            // Response untuk API
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kode OTP tidak ditemukan atau telah kadaluarsa.',
                ], 400);
            }
            return back()->with('error', 'Kode OTP tidak ditemukan atau telah kadaluarsa.');
        }

        // Cek apakah token sudah kadaluarsa
        if (Carbon::now()->gt($tokenRecord->expires_at)) {
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kode OTP telah kadaluarsa.',
                ], 400);
            }
            return back()->with('error', 'Kode OTP telah kadaluarsa.');
        }

        // Cek apakah token sudah pernah diverifikasi
        if ($tokenRecord->verified_at) {
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kode OTP sudah digunakan.',
                ], 400);
            }
            return back()->with('error', 'Kode OTP sudah digunakan.');
        }

        // Verifikasi hash OTP
        if (Hash::check($request->otp_code, $tokenRecord->token)) {
            DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->update(['verified_at' => Carbon::now()]);

            // Response untuk API
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'OTP verified successfully.',
                    'reset_token' => Str::random(60),
                ]);
            }

            // Response untuk Web
            return redirect()->route('newpass')->with([
                'success' => 'OTP berhasil diverifikasi. Silakan buat password baru.',
                'email' => $request->email
            ]);
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Kode OTP tidak valid.',
            ], 400);
        }
        return back()->with('error', 'Kode OTP tidak valid.');
    }

    public function resetPassword(Request $request)
    {
        // Validasi password baru
        $request->validate([
            'email' => 'email|exists:users,email',
            'password' => 'required|min:8',
            'confirmpassword' => 'required|min:8|same:password',
        ]);
        
        $user = User::where('email', $request->email)->first();
        
        // Cek apakah OTP sudah diverifikasi
        $tokenRecord = DB::table('password_reset_tokens')
                        ->where('email', $request->email)
                        ->first();

                        
        // dd('masuk reset password', $request->all(), $tokenRecord);

        if (!$tokenRecord || !$tokenRecord->verified_at) {
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Harus verifikasi OTP terlebih dahulu.',
                ], 400);
            }
            return back()->with('error', 'Harus verifikasi OTP terlebih dahulu.');
        }

        // Reset password user
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        // Hapus record dari password_reset_tokens setelah berhasil reset
        DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->delete();

        // Response untuk API
        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Password berhasil direset. Silakan login dengan password baru.',
            ]);
        }

        // Response untuk Web
        return redirect()->route('newpass')->with([
            'show_success_modal' => true,
            'success' => 'Password berhasil direset. Silakan login dengan password baru.'
        ]);
    }

    // Cek status OTP (optional)
    public function checkOtpStatus(Request $request)
    {
        // Cek status token reset password untuk email tertentu
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $tokenRecord = DB::table('password_reset_tokens')
                        ->where('email', $request->email)
                        ->first();

        if (!$tokenRecord) {
            return response()->json([
                'exists' => false,
                'verified' => false,
                'expired' => false,
            ]);
        }

        return response()->json([
            'exists' => true,
            'verified' => !is_null($tokenRecord->verified_at),
            'expired' => Carbon::now()->gt($tokenRecord->expires_at),
            'expires_in' => Carbon::now()->diffInMinutes($tokenRecord->expires_at),
        ]);
    }
}