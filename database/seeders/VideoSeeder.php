<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slots = [
            ['url_video' => 'https://www.youtube.com/embed/5XBgBU7OuFA', 'title' => 'A Healthier Future For All'],
            ['url_video' => 'https://www.youtube.com/embed/GBN3ZPB-YTs', 'title' => 'Let Your True Colours Shine'],
            ['url_video' => 'https://www.youtube.com/embed/VXtUkevovms', 'title' => 'Pahlawan Ekonomi Bangsa'],
            ['url_video' => 'https://www.youtube.com/embed/4tOckShp_tc', 'title' => 'Mengenang 20 Tahun Tsunami Aceh'],
            ['url_video' => 'https://www.youtube.com/embed/tBpi1A73bWQ', 'title' => 'Beyond Emissions'],
            ['url_video' => 'https://www.youtube.com/embed/CwNz3IbZ-LQ', 'title' => 'Leading Women'],
        ];

        foreach ($slots as $slot) {
            video::firstOrCreate(
                $slot
            );
        }
    }
}
