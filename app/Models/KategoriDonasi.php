<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriDonasi extends Model
{
    use HasFactory;

    protected $table = 'kategori_donasi';

    protected $fillable = [
        'name',
        'icon',
        'css_class_name_color'.
        'css_class_name_icon'
    ];

    public function kategoriDonasiYayasan()
    {
        return $this->hasMany(KategoriDonasiYayasan::class);
    }
}
