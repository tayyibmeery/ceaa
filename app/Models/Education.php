<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $fillable = [
        'user_id',
        'degree_title',
        'institute',
        'board_university',
        'passing_year',
        'grade_cgpa',
        'major_subject',
        'total_marks',
        'obtained_marks',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
