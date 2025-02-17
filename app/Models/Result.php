<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable = ['application_id', 'marks_obtained', 'total_marks', 'remarks'];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
