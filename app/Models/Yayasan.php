<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yayasan extends Model
{
    use HasFactory;

    protected $table = 'yayasan';

    protected $fillable = [
        'user_id',
        'name',
        'city',
        'address',
        'contact',
        'bank_name',
        'bank_number',
        'bank_owner',
        'description',
        'donation_purposes',
        'logo'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        });

//        $query->when($filters['category'] ?? false, function ($query, $category) {
//            $categoryArr = explode('#', $category);
//            return $query->whereHas('company', function($query) use ($categoryArr) {
//                $query->whereHas('category', function ($query) use ($categoryArr) {
//                    $query->whereIn('name', $categoryArr);
//                });
//            });
//        });
    }

    public function activityYayasan()
    {
        return $this->hasMany(ActivityYayasan::class);
    }

    public function donation()
    {
        return $this->hasMany(Donation::class);
    }

    public function kategoriDonasiYayasan()
    {
        return $this->hasMany(KategoriDonasiYayasan::class);
    }

    public function programYayasan()
    {
        return $this->hasMany(ProgramYayasan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
