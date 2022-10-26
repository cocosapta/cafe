<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Kode;
use Illuminate\Support\Facades\Hash; 
use App\Models\User;
class UserController extends Controller
{
    public function store(Request $request)
    {
       $request->validate([
            'name' => 'required',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|max:255',
            'password' => 'required|min:5|max:255'

        ]); 
        
        $data = new user;
        $data->name = $request->name;
        $data->username = $request->username;
        $data->password = Hash::make(Str::random(8));
        $data->email = $request->email;
        $data->level = '2';
        $data->save();
        

        return redirect()->route('login')->with('success', 'Register Successfully');
    }
}
