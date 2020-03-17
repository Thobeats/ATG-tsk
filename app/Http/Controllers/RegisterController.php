<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'name' => "required | unique:users,name",
            'email' => "required | email",
            'pincode' => "required | digits:6 | unique:users,password"
        ]);
        $user = new User();

        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('pincode');

        $user->save();
        return redirect('/')->with('msg', "You have succesfully registered");
    }

    public function show(){
        return view('welcome');
    }
}
