<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'yayasan_id',
        'user_id',
        'nama_pengirim',
        'alamat_pengirim',
        'no_tlp_pengirim',
        'tujuan_donasi',
        'kondisi_barang',
        'jumlah_barang',
        'deskripsi_barang',
        'image1',
        'image2',
        'image3',
        'nama_kurir',
        'resi_kurir',
        'status'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['yayasan_id'] ?? false, function ($query, $yayasanId) {
            return $query->where('yayasan_id', '=', $yayasanId);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function yayasan()
    {
        return $this->belongsTo(Yayasan::class);
    }
}
