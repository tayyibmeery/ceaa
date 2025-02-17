<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RollNumberSlip extends Model
{
    use HasFactory;
    protected $fillable = ['application_id', 'test_id', 'roll_number', 'serial_number'];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
