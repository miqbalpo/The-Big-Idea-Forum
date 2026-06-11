<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slots = [
            ['slot_image' => 'Gallery1', 'image' => 'Gallery1.png'],
            ['slot_image' => 'Gallery2', 'image' => 'Gallery2.png'],
            ['slot_image' => 'Gallery3', 'image' => 'Gallery3.png'],
            ['slot_image' => 'Gallery4', 'image' => 'Gallery4.png'],
            ['slot_image' => 'Gallery5', 'image' => 'Gallery5.png'],
            ['slot_image' => 'Gallery6', 'image' => 'Gallery6.png'],
            ['slot_image' => 'Gallery7', 'image' => 'Gallery7.png'],
            ['slot_image' => 'Gallery8', 'image' => 'Gallery8.png'],
            ['slot_image' => 'Gallery9', 'image' => 'Gallery9.png'],
            ['slot_image' => 'Gallery10', 'image' => 'Gallery10.png'],
        ];

        foreach ($slots as $slot) {
            Gallery::firstOrCreate(
                ['slot_image' => $slot['slot_image']],
                $slot
            );
        }
    }
}
