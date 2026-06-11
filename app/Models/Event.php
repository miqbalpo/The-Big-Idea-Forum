<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    protected $fillable = [
        'title',
        'date',
        'location',
        'description',
        'isdeleted',
    ];

    protected $casts = [
        'date' => 'date', // Atau 'datetime' jika menyimpan tanggal dengan waktu
    ];

    public function narasumbers(): HasMany
    {
        // Diasumsikan foreign key di tabel 'narasumbers' adalah 'event_id'
        return $this->hasMany(Narasumber::class, 'event_id');
    }
}
