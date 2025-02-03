<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramYayasan extends Model
{
    use HasFactory;

    protected $table = 'program_yayasan';

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
