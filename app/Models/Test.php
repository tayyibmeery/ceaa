<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\GenerateRollNumberSlips;
class Test extends Model
{
    use HasFactory;
    protected $fillable = ['job_post_id', 'test_date', 'test_time', 'test_center'];

    public function jobPost()
    {
        return $this->belongsTo(JobPost::class);
    }
    public function rollNumberSlips()
    {
        return $this->hasMany(RollNumberSlip::class);
    }



    protected static function booted()
    {
        static::created(function ($test) {
            GenerateRollNumberSlips::dispatch($test);
        });

        static::updated(function ($test) {
            GenerateRollNumberSlips::dispatch($test);
        });
    }
}
