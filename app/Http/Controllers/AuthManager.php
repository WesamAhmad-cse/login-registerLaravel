<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function registration()
    {
        return view('registration');
    }

    public function loginPost(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',

        ]);

        $credentials = $req->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with("error", "login details are not valid");

    }

    public function registrationPost(Request $req)
    {
        // $test = $req->file('image')->getClientOriginalExtension();
        // dd($test);

        $req->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|max:191|unique:users|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required|confirmed',
            'image' => ['sometimes', 'image', 'mimes:jpj,jpeg,svg,png', 'max:5000'],

        ]);

        if (request()->has('image')) {
            //$imageUploaded = request()->file('image');
            $imageName = time() . '_' . $req->name . '.' . $req->image->extension();
            // dd($imageName);
            $req->image->move(public_path('images'), $imageName);

            // $imageUploaded->move($imagePath, $imageName);

        }

        $data['first_name'] = $req->first_name;
        $data['last_name'] = $req->last_name;
        $data['email'] = $req->email;
        $data['password'] = Hash::make($req->password);
        $data['image'] = $req->image;

        $user = User::create($data);
        if (!$user) {
            return redirect(route('registration'))->with("error", "Registration faild try again");
        }
        return redirect(route('login'))->with("success", "Registration success");
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

}
