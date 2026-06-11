<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Narasumber;

class EventSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $event = Event::create([
            'title' => 'RESTORATIVE ECONOMY:<br>SMALL SCALE, BIG DIFFERENCE',
            'date' => '2025-08-12',
            'location' => 'CNN Studio 2',
            'description' => 'What: A high level Talkshow conducted Live on Tape and to be aired on CNN Indonesia as well as amplified
                                on our universe of multimedia digital platforms.',
        ]);

        Narasumber::create([
            'event_id' => $event->id,
            'name' => 'Faisol Riza',
            'jabatan' => 'Wakil Menteri Perindustrian',
        ]);

        Narasumber::create([
            'event_id' => $event->id,
            'name' => 'Veronica Tan',
            'jabatan' => 'Wakil Menteri PPPA',
        ]);

        Narasumber::create([
            'event_id' => $event->id,
            'name' => 'Irene Umar',
            'jabatan' => 'Wakil Menteri Ekonomi Kreatif',
        ]);
        
        Narasumber::create([
            'event_id' => $event->id,
            'name' => 'Dharsono Hatono',
            'jabatan' => 'Direktur Utama PT Rimba Makmur Utama',
        ]);
        
        Narasumber::create([
            'event_id' => $event->id,
            'name' => 'Monica Tanuhandaru',
            'jabatan' => 'Ketua Yayasan Bambu Lingkungan Lestari',
        ]);
    }
}
