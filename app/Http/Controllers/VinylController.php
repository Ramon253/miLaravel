<?php

namespace App\Http\Controllers;

use App\Models\Vinyls;
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
    public function show(string $id)
    {
        return view('vinyl.vinyl',[
            'vinyl' => Vinyls::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vinyls $vinyls)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vinyls $vinyls)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vinyls $vinyls)
    {
        //
    }
}
