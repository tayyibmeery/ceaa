<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'job_post_id',
        'status',
        'resume',
        'cover_letter',
        'highest_qualification',
        'experience_years',
        'fees_receipt',
        'payment_status',
        'submission_date',
        'reviewer_remarks',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobPost()
    {
        return $this->belongsTo(JobPost::class);
    }

    public function rollNumberSlip()
    {
        return $this->hasOne(RollNumberSlip::class);
    }
    public function test()
    {
        return $this->hasOne(Test::class, 'job_post_id', 'job_post_id');
    }
    public function result()
    {
        return $this->hasOne(Result::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', '!=', 'rejected');
    }


}
