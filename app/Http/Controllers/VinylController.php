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
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vinyl $vinyls)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vinyl $vinyls)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vinyl $vinyls)
    {
        //
    }
}
