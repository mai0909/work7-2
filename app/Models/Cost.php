<?php

namespace App\Models;

use App\Models\Like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\User;   //Userモデルを使用

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class Cost extends Model
{
    protected $fillable = 
    [
        'id',
        'cost',
        'user_id',
        'house_id',
        'toilet',
        'bath',
        'kitchen',
        'floor',
        'pillar'
    ];
}

