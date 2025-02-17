<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutIcon extends Model
{
    use HasFactory;
    protected $table = 'about_icons';
    protected $fillable = [

        'about_icon_name',
        'about_icon_detail',

    ];
}
