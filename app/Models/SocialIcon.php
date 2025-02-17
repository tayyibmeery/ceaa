<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialIcon extends Model
{
    use HasFactory;
    protected $table = 'social_icons';
    protected $fillable = [

        'social_icon_name',
        'social_icon_url',
      
    ];
}
