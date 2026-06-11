<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Moderator;
use App\Models\Gallery;
use App\Models\Narasumber;
use App\Models\User;
use App\Models\Video;


class ViewEventController extends Controller
{
    public function index()
    {
        // Ambil data moderator, galeri, dan video aktif
        $moderators = Moderator::first();
        $gallery = Gallery::pluck('image', 'slot_image');
        $videos = Video::where('isdeleted', '!=', 1)->get();
        $events = Event::with('narasumbers') // 'narasumbers' adalah nama method relasi di model Event
                       // Jika Anda hanya ingin kolom spesifik dari event:
                       ->select('id', 'title', 'description', 'date', 'location')
                       ->get();
        
        $eventData = $events->first(); // Mengambil event yang pertama (jika $events tidak kosong)
        
        // Cek jika eventData ditemukan
        if (!$eventData) {
             // Handle jika tidak ada data event yang ditemukan
             return redirect('/')->with('error', 'Event tidak ditemukan.');
             // Untuk contoh ini, kita asumsikan data selalu ada atau Anda menangani ini di View.
        }

        // Variabel untuk View:
        $event = $eventData;
        $narasumbers = $eventData->narasumbers; // Data narasumber otomatis tersedia karena Eager Loading


        // ✅ Ambil video dengan kategori waktu
       $videos_latest = Video::where('isdeleted', '!=', 1)
            ->whereDate('created_at', now()->toDateString()) // hanya hari ini
            ->orderBy('created_at', 'desc')
            ->get();

        // 1 minggu sebelum (tidak termasuk hari ini)
        $videos_1w = Video::where('isdeleted', '!=', 1)
            ->whereDate('created_at', '<', now()->toDateString())   // exclude hari ini
            ->whereDate('created_at', '>=', now()->subWeek()->toDateString())
            ->orderBy('created_at', 'desc')
            ->get();

        // 1 bulan sebelum (7 hari - 30 hari lalu)
        $videos_1m = Video::where('isdeleted', '!=', 1)
            ->whereDate('created_at', '<', now()->subWeek()->toDateString())
            ->whereDate('created_at', '>=', now()->subMonth()->toDateString())
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($narasumbers, $event, $moderators, $gallery);
        // 3. Kirim data ke View
        return view('Users.Global.main', [
            'moderators' => $moderators,
            'gallery' => $gallery,
            'event' => $event,           // Data informasi event (satu record)
            'narasumbers' => $narasumbers, // Data narasumber (Collection/Array untuk looping)
            'videos' => $videos,
            'videos_latest' => $videos_latest,
            'videos_1w' => $videos_1w,
            'videos_1m' => $videos_1m,
        ]);
    }
    public function admin()
    {
        return view('Admin.Global.main');
    }
    public function event()
    {
        // Ambil data event untuk halaman admin
        $events = Event::with('narasumbers') // 'narasumbers' adalah nama method relasi di model Event
                       // Jika Anda hanya ingin kolom spesifik dari event:
                       ->select('id', 'title', 'description', 'date', 'location')
                       ->get();
        
        $eventData = $events->first(); // Mengambil event yang pertama (jika $events tidak kosong)
        
        // Cek jika eventData ditemukan
        if (!$eventData) {
             // Handle jika tidak ada data event yang ditemukan
             return redirect('/')->with('error', 'Event tidak ditemukan.');
             // Untuk contoh ini, kita asumsikan data selalu ada atau Anda menangani ini di View.
        }

        // Variabel untuk View:
        $event = $eventData;
        $narasumbers = $eventData->narasumbers; // Data narasumber otomatis tersedia karena Eager Loading
        return view('Admin.Content.event', [
            'event' => $event,           // Data informasi event (satu record)
            'narasumbers' => $narasumbers // Data narasumber (Collection/Array untuk looping)
        ]);
    }

    public function gallery()
    {
        // Ambil semua gambar galeri untuk admin
        $gallery = Gallery::pluck('image', 'slot_image');
        return view('Admin.Content.gallery', ['gallery' => $gallery]);
    }
    public function moderator()
    {
        // Ambil data moderator untuk admin
        $moderator = Moderator::first(); // Ambil data moderator pertama
        return view('Admin.Content.moderator', ['moderator' => $moderator]);
    }
    public function video()
    {
         // Ambil video terbaru (hari ini)
        $videos_latest = Video::where('isdeleted', '!=', 1)
            ->whereDate('created_at', now()->toDateString())
            ->orderBy('created_at', 'desc')
            ->get();

        // 1 minggu sebelumnya
        $videos_1w = Video::where('isdeleted', '!=', 1)
            ->whereDate('created_at', '<', now()->toDateString())  
            ->whereDate('created_at', '>=', now()->subWeek()->toDateString())
            ->orderBy('created_at', 'desc')
            ->get();

        // 1 bulan sebelumnya
        $videos_1m = Video::where('isdeleted', '!=', 1)
            ->whereDate('created_at', '<', now()->subWeek()->toDateString())
            ->whereDate('created_at', '>=', now()->subMonth()->toDateString())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('Admin.Content.videos', [
            'videos_latest' => $videos_latest,
            'videos_1w'     => $videos_1w,
            'videos_1m'     => $videos_1m,
        ]);
    }
    public function allvideos()
    {
        // Halaman semua video untuk user
        // Ambil semua video sesuai kategori waktu
        $videos_latest = Video::where('isdeleted', '!=', 1)
            ->whereDate('created_at', now()->toDateString()) // hanya hari ini
            ->orderBy('created_at', 'desc')
            ->get();

        // 1 minggu sebelum (tidak termasuk hari ini)
        $videos_1w = Video::where('isdeleted', '!=', 1)
            ->whereDate('created_at', '<', now()->toDateString())   // exclude hari ini
            ->whereDate('created_at', '>=', now()->subWeek()->toDateString())
            ->orderBy('created_at', 'desc')
            ->get();

        // 1 bulan sebelum (7 hari - 30 hari lalu)
        $videos_1m = Video::where('isdeleted', '!=', 1)
            ->whereDate('created_at', '<', now()->subWeek()->toDateString())
            ->whereDate('created_at', '>=', now()->subMonth()->toDateString())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('Users.Content.allvideos', [
            'videos_latest' => $videos_latest,
            'videos_1w' => $videos_1w,
            'videos_1m' => $videos_1m,
        ]);
    }

    public function adminmanager()
    {
        // Ambil daftar user admin (kecuali super admin ID 1)
        $users = User::where('isdeleted', '!=', 1)->where('id', '!=', 1)->get();
        return view('Admin.Content.adminmanager', ['users' => $users]);
    }

    public function login()
    {
        return view('auth.login');
    }

}
