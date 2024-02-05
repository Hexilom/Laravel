<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        //$users = DB::select("SELECT * FROM users);
        return view('user.index', compact('users'));
    }

    public function create()
    {
        //un metodo
        $user = new User;
        $user->name = "guille";
        $user->email = "demo@mail.com";
        $user->password = Hash::make('1234');
        $user->age = 25;
        $user->address = "calle xd 123";
        $user->zip_code = 1818;
        $user->save();
        //otro metodo
        User::create([
            "name" => "ruiz",
            "email" => "inf@sd.com",
            "password" => Hash::make('12345'),
            "age" => 45,
            "address" => "callefalsa 12",
            "zip_code" => 1252
        ]);

        return redirect()->route('user.index');
    }
}
