<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    /**
     *
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.register');
    }

    public function login(Request $request){
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);
        $formFields['password'] = password_hash($formFields['password'], PASSWORD_DEFAULT );
        $user = Users::create($formFields);

        return redirect('/')->with('message' , 'usuario creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Users $users)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Users $users)
    {
        //
    }
}
