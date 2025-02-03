<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'name',
        'phone',
        'image',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function checkRole(String $role)
    {
        if($role == 'notAdmin') {
            if($this->role_id == 1) return false;
            else return true;
        }
        else if($role == 'admin') {
            if($this->role_id == 1) return true;
            return false;
        } else if($role == 'donatur') {
            if($this->role_id == 2) return true;
            else return false;
        } else if($role == 'yayasan') {
            if($this->role_id == 3) return true;
            else return false;
        }

        return false;
    }

    public function article()
    {
        return $this->hasMany(Article::class);
    }

    public function discussion()
    {
        return $this->hasMany(Discussion::class);
    }

    public function discussionDetail()
    {
        return $this->hasMany(DiscussionDetail::class);
    }

    public function donation()
    {
        return $this->hasMany(Donation::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function yayasan()
    {
        return $this->hasMany(Yayasan::class);
    }
}
