<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ImageService;
use App\Models\Moderator;
use App\Models\Gallery;
use App\Models\Event;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /* ============================================================
        FUNGSI KONVERSI URL YOUTUBE → EMBED
    ============================================================ */
    private function convertYoutubeUrl($url)
    {
        // Ubah URL YouTube biasa menjadi format embed
        // Format watch?v=
        if (preg_match('/watch\?v=([^&]+)/', $url, $match)) {
            return 'https://www.youtube.com/embed/' . $match[1];
        }

        // Format youtu.be
        if (preg_match('/youtu\.be\/([^?]+)/', $url, $match)) {
            return 'https://www.youtube.com/embed/' . $match[1];
        }

        // Jika sudah embed
        if (str_contains($url, 'youtube.com/embed/')) {
            return $url;
        }

        return $url;
    }

    /* ============================================================
        MODERATOR
    ============================================================ */
    public function store(Request $request)
    {
        try {
            // Validasi input moderator
            $request->validate([
                'moderator_id' => 'required|exists:moderators,id',
                'name' => 'required|string|max:255',
                'deskripsi_content' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            ]);

            $moderator = Moderator::find($request->moderator_id);
            if (!$moderator) {
                return back()->with('error', 'Moderator tidak ditemukan.');
            }

            $dataToUpdate = [
                'name' => $request->name,
                'deskripsi' => $request->deskripsi_content,
            ];

            // Proses upload gambar jika ada
            if ($request->hasFile('image')) {
                $path = 'image';
                $oldFileName = $moderator->image;

                if ($oldFileName) {
                    $this->imageService->deleteImage($oldFileName, $path);
                }

                $uploaded = $this->imageService->uploadImages($request->file('image'), $path);
                $newFileName = $uploaded[0] ?? null;

                if ($newFileName) {
                    $dataToUpdate['image'] = $newFileName;
                }
            }

            $moderator->update($dataToUpdate);

            return back()->with('success', 'Data moderator berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui moderator: ' . $e->getMessage());
            return back()->with('error', 'Gagal memperbarui data moderator.');
        }
    }

    /* ============================================================
        GALLERY
    ============================================================ */
    public function updateGallery(Request $request)
    {
        try {
            // Validasi file galeri
            $request->validate([
                'gallery_files.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $uploadedFiles = $request->file('gallery_files');
            $path = 'image';
            
            if (!$uploadedFiles) {
                return back()->with('error', 'Tidak ada file yang diupload.');
            }

            // Loop setiap slot galeri yang diupload
            foreach ($uploadedFiles as $slotName => $file) {
                $gallerySlot = Gallery::where('slot_image', $slotName)->first();
                if (!$gallerySlot || !$file->isValid()) continue;

                $oldFileName = $gallerySlot->image;

                if ($oldFileName) {
                    $this->imageService->deleteImage(fileName: $oldFileName, path: $path);
                }

                $uploaded = $this->imageService->uploadImages(files: $file, path: $path);
                $newFileName = $uploaded[0] ?? null;

                if ($newFileName) {
                    $gallerySlot->update(['image' => $newFileName]);
                }
            }

            return back()->with('success', 'Galeri berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui galeri: ' . $e->getMessage());
            return back()->with('error', 'Gagal memperbarui galeri.');
        }
    }

    /* ============================================================
        EVENT
    ============================================================ */
    public function saveOrUpdateEvent(Request $request)
    {
        // Validasi data event dan peserta
        $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi_content' => 'nullable|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'participants' => 'required|array',
            'role' => 'required|array',
        ]);
        
        DB::beginTransaction();

        try {
            $event = Event::findOrFail($request->event_id);

            // UPDATE EVENT
            $event->update([
                'title' => $request->title,
                'date' => $request->date,
                'location' => $request->location,
                'description' => $request->deskripsi_content,
            ]);

            // ❗ HAPUS SEMUA PESERTA LAMA
            $event->narasumbers()->delete();

            // ❗ INSERT ULANG PESERTA BARU
            foreach ($request->participants as $i => $name) {
                $event->narasumbers()->create([
                    'name' => $name,
                    'jabatan' => $request->role[$i],
                ]);
            }

            DB::commit();
            return back()->with('success', 'Event berhasil disimpan!');

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Gagal simpan event: ' . $e->getMessage());
            return back()->with('error', 'Gagal menyimpan event.');
        }
    }

    /* ============================================================
        VIDEO — FIX EMBED
    ============================================================ */
    public function storeVideos(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url_video' => 'required|url',
        ]);

        try {
            // Konversi URL ke format embed sebelum disimpan
            $embedUrl = $this->convertYoutubeUrl($request->url_video);

            Video::create([
                'title' => $request->title,
                'url_video' => $embedUrl,
                'isdeleted' => 0,
            ]);

            return redirect()->route('videos.index')->with('success', 'Video berhasil disimpan!');
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan video: ' . $e->getMessage());
            return back()->with('error', 'Gagal menyimpan video.');
        }
    }

    public function deleteVideo($id)
    {
        try {
            // Soft delete video (set flag isdeleted = 1)
            $video = Video::findOrFail($id);
            $video->update(['isdeleted' => 1]);
            return back()->with('success', 'Video berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus video: ' . $e->getMessage());
            return back()->with('error', 'Gagal menghapus video.');
        }
    }

    public function updateVideo(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url_video' => 'required|url',
        ]);

        try {
            $video = Video::findOrFail($id);

            // Update URL video dengan format embed baru
            $embedUrl = $this->convertYoutubeUrl($request->url_video);

            $video->update([
                'title' => $request->title,
                'url_video' => $embedUrl,
            ]);

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            Log::error('Gagal update video: ' . $e->getMessage());
            return response()->json(['success' => false], 500);
        }
    }

    /* ============================================================
        AKUN MANAJEMENT
    ============================================================ */
    public function register(Request $request)
    {
        try {
            // Cek ketersediaan email dan username
            $emailExists = User::where('email', $request->email)->exists();
            $usernameExists = User::where('name', $request->username)->exists();
            
            if ($emailExists || $usernameExists) {
                return back()->withErrors([
                    'email' => $emailExists ? 'Email ini sudah digunakan oleh akun lain' : null,
                    'username' => $usernameExists ? 'Username ini sudah digunakan oleh akun lain' : null,
                ])->withInput();
            }

            $request->validate([
                'username' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                // 'confirmpassword' => 'required|min:8|same:password',
            ]);
            
            // Buat akun baru
            $user = User::create([
                'name' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            
            // dd('masuk register');
            // dd($user);

            // Auth::login($user);

            return redirect()->back()->with('success', 'Akun berhasil dibuat! Silakan login.');
        } catch (\Exception $e) {
            Log::error('Gagal membuat akun: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal membuat akun. Silakan coba lagi.');
        }
    }

    public function editAkun(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi update akun (ignore ID sendiri untuk unique check)
        $request->validate([
            'username' => 'required|string|max:255|unique:users,name,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
        ]);

        $dataToUpdate = [
            'name' => $request->username,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $dataToUpdate['password'] = bcrypt($request->password);
        }

        $user->update($dataToUpdate);

        return response()->json(['success' => true]);
    }

    public function deleteAkun($id)
    {
        try {
            // Soft delete akun user
            $user = User::findOrFail($id);
            $user->update(['isdeleted' => 1]);

            return redirect()->back()->with('success', 'Akun berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus akun: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus akun.');
        }
    }
}
