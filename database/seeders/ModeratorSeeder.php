<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Moderator;

class ModeratorSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Moderator::insert([
            'name' => 'Desi Anwar',
            'image' => 'fotomoderator.jpg',
            'deskripsi' => '
            Desi Anwar adalah Jurnalis Senior dan Direktur Pengembangan Bisnis di CNN Indonesia yang berbasis di Jakarta. Ia dikenal sebagai Pembawa Berita TV nasional terkemuka dan pelopor dalam industri Penyiaran dan Media di Indonesia. Saat ini, Desi menjadi Host Talkshow prime time CNN Indonesia, Insight with Desi Anwar, menampilkan wawancara mendalam dengan pembuat kebijakan, tokoh publik, newsmaker, selebriti, dan pengambil keputusan dari Indonesia dan seluruh dunia. Sebelum di CNN Indonesia, Desi menjabat sebagai Jurnalis Senior/Host Talk Show di Metro TV, Jakarta, membawakan acara \'Face2Face with Desi Anwar\' yang menampilkan banyak tokoh internasional terkemuka seperti The Dalai Lama, Sir Richard Branson, George Soros, Christine Lagarde, dan lainnya. Ia juga membawakan \'Tea Time with Desi Anwar\', ‘Today’s Dialogue,’ ‘Economic Challenges,’ dan ‘Perempuan’ di Metro TV.
            Karier Desi di bidang Jurnalisme dan Industri Penyiaran dimulai pada tahun 1990 di RCTI (TV swasta pertama di Indonesia) sebagai reporter, anchor, dan produser eksekutif pelopor. Ia membawakan berita prime time Seputar Indonesia, Nuansa Pagi, Bulletin Siang, dan memproduksi majalah urusan terkini Liputan Khusus. Desi juga unggul dalam adopsi teknologi dengan ikut mendirikan Astaga.com pada tahun 1999, portal web pertama di Indonesia. Selain karier penyiaran, Desi adalah penulis yang produktif. Buku-bukunya yang diterbitkan oleh Gramedia meliputi A Romantic Journey, Tips for Life, A Simple Life, Offline: finding yourself in the age of distractions, dan The Art of Solitude. Desi juga merupakan kolumnis untuk The Jakarta Globe, Mainichi Shimbun, Tempo English magazine, The Jakarta Post, dan Indonesian Observer.'            
        ]);
    }
}
