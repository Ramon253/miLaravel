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


    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }

    public function login(Request $request)
    {
        $identifier = self::getIdentifier($request);

        $formData = $request->validate([
            $identifier['field'] => $identifier['validation'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formData)) {
            $user = Users::where($identifier['field'], $identifier['value'])->first();
            if (is_null( $user->email_verified_at)){
                return self::sendMail($user);
            }
            $request->session()->regenerate();
            return redirect('/')->with('message', 'Logged in successfully');
        }
        return back()->with('message' , 'Auth failed');
    }

    private static function sendMail($user)
    {
        session(['verificationCode' => rand(100000, 999999)]);
        session(['user' => $user]);
        return redirect('/verify');
    }

    public function getVerify()
    {
        if (session()->missing('verificationCode')) {
            return redirect('/')->with('message', 'No has figura ningun intento de verificacion');
        }
        return view('user.verify');
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
        $formFields['password'] = password_hash($formFields['password'], PASSWORD_DEFAULT);
        $user = Users::create($formFields);

        return redirect('/login')->with('message', 'usuario creado con exito');
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
    private static function getIdentifier(Request $request)
    {
        $field = 'name';
        $validation = ['required'];
        $value = $request->name;
        if (isset($request->email)) {

            $field = 'email';
            $validation[] = 'email';
            $value = $request->email;
        }
        return ['field' => $field, 'validation' => $validation, 'value' => $value];
    }
}
