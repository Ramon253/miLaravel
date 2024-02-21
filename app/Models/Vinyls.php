<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vinyls extends Model
{
    use HasFactory;

    protected $fillable = ["name", "stock", "price", "style", "duration", "max_duration"];

    public static function getSongs($id_vinyl)
    {
        return DB::table('songs')
            ->select('songs.*')
            ->join('has_songs', 'songs.id', '=', 'has_songs.id_song')
            ->join('vinyls', 'has_songs.id_vinyl', '=', 'vinyls.id')
            ->where('vinyls.id', $id_vinyl)
            ->get();
    }
}
