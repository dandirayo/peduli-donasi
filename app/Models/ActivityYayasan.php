<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityYayasan extends Model
{
    use HasFactory;

    protected $table = 'activity_yayasan';

    protected $fillable = [
        'yayasan_id',
        'title',
        'description',
        'image'
    ];

    public function yayasan()
    {
        return $this->belongsTo(Yayasan::class);
    }
}
