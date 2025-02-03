<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriDonasiYayasan extends Model
{
    use HasFactory;

    protected $table = 'kategori_donasi_yayasan';

    protected $fillable = [
        'yayasan_id',
        'kategori_donasi_id'
    ];

    public function yayasan()
    {
        return $this->belongsTo(Yayasan::class);
    }

    public function kategoriDonasi()
    {
        return $this->belongsTo(KategoriDonasi::class);
    }
}
