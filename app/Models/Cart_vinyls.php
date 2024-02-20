<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vinyls;
use Illuminate\Support\Facades\DB;

class Cart_vinyls extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_vinyl',
        'quantity'
    ];

    public static function getCartVinyls($id_user){
        DB::table('vinyls')
            ->select('vinyls.*')
            ->join('cart_vinyls' , 'vinyls.id', '=', 'cart_vinyl.id_vinyl')
            ->join('users' , 'users.id', '=', 'cart_vinyl.id_user')
            ->where('user.id' , $id_user);
    }
}
