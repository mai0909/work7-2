<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable =
    [
        'id',
        'top_img',
        'sub_img1',
        'sub_img2',
        'sub_img3',
        'sub_img4',
        'sub_img5',
        'house_id'
    ];

    // public function house() {
    //     return $this->belongsTo('App\House');
    //     }
}