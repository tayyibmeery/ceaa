<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    // protected $fillable = ['organization_id', 'title', 'description', 'requirements', 'advertisement_date', 'application_deadline'];
    protected $fillable = [
        'organization_name',
        'title',
        'description',
        'requirements',
        'advertisement_date',
        'application_deadline',
        'advertisement_file',
        'status',
        'is_visible',
    ];


    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function test()
    {
        return $this->hasOne(Test::class);
    }

    public function getAdvertisementFileUrlAttribute()
    {
        return asset('storage/' . $this->advertisement_file);  // Assuming the file is stored in the 'storage' directory
    }



    public function scopeActive($query)
    {
        return $query->where('status', 'active')->where('is_visible', true);
    }
 

}
