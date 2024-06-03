<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiteController extends Controller
{
    public function createUser()
    {
        // Generate a random name and email for the new user (replace with actual values)
        $name = 'John Doe';
        $email = 'john@example.com';
        $password = 'password'; // Set the desired password for the new user

        // Insert the user data into the users table
        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password), // Hash the password before inserting
        ]);

        return 'User created successfully.';
    }
    public function auth(Request $req) {
        if (Auth::attempt(['email'=>$req->em, 'password'=>$req->pwd])) {
            return redirect('/products');
        }
        return redirect('/login')->with('msg', 'Email / password salah');
    }
}