<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Events\RegistrationEvent;
use App\Http\Requests\StoreUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Redirect the user to the registration view
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function show()
    {
        return redirect()->route('index');
    }

    /**
     * Store a new user into the database
     *
     * @param StoreUser $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(StoreUser $request)
    {

        $request->flashExcept('password');

        /**
         * Create a new User
         *
         * @var User $user
         */
        $user = User::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('registration_email'),
            'password' => Hash::make($request->input('registration_password')),
            'birthday' => $request->input('birthday'),
            'sex' => $request->input('sex'),
            'active' => true
        ]);


        Auth::login($user);
        
        //Redirect '/'
        return redirect()->intended(route('home'));

    }
}
