<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vinyl;
use Illuminate\Support\Facades\DB;

class Cart_vinyls extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_vinyl',
        'quantity'
    ];

    public static function getCartVinyls($id_user)
    {
        return  DB::table('vinyls')
            ->select('vinyls.*', 'quantity')
            ->join('cart_vinyls', 'vinyls.id', '=', 'cart_vinyls.id_vinyl')
            ->join('users', 'users.id', '=', 'cart_vinyls.id_user')
            ->where('users.id', $id_user)
            ->get();
    }
}
