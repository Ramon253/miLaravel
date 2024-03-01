<?php

namespace App\Http\Controllers;

use App\Models\Vinyl;
use Illuminate\Http\Request;

class VinylController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }



    /**
     * Display the specified resource.
     */
    public function show(Vinyl $vinyl)
    {
        $songs = $vinyl->getSongs();
        return view('vinyl.vinyl',[
            'vinyl' => $vinyl,
            'songs' => $songs
        ]);
    }


}
