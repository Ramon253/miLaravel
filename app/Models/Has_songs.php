<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Has_songs extends Model
{
    use HasFactory;
    protected $fillable = ['id_vinyl', 'id_song'];
}
