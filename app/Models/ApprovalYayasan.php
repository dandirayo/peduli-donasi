<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalYayasan extends Model
{
    use HasFactory;

    protected $table = 'approval_yayasan';

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
        'logo',
        'category_food',
        'category_stationary',
        'category_clothes',
        'yayasan_documents',
        'status',
        'comment'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['status'] ?? false, function ($query, $status) {
            return $query->where('status', '=', $status);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
