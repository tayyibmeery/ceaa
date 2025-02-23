<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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

    protected $fillable = ['first_name',
        'last_name',
        'father_name',
        'email', 'password', 'role',
        'cnic',
        'date_of_birth',
        'phone',
        'name',
        'address',
        'province_of_domicile',
        'district_of_domicile',
        'postal_city',
        'postal_address',
        'gender',
        'profile_picture',];



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
        'password' => 'hashed',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    public function results()
    {
        return $this->hasMany(Result::class);
    }
    public function rollNumberSlips()
    {
        return $this->hasMany(RollNumberSlip::class);
    }
    public function jobPosts()
    {
        return $this->belongsToMany(JobPost::class, 'applications');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    public function getProfilePictureUrlAttribute()
    {
        return $this->profile_picture ? asset('storage/' . $this->profile_picture) : asset('images/default-profile.jpg');
    }
    public function resultsThroughApplications()
    {
        return $this->hasManyThrough(Result::class, Application::class, 'user_id', 'application_id');
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }
}
