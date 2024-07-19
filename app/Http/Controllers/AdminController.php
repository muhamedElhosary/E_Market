<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    
public function adminlogin(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect('/admin');
    }

    return back()->withErrors([
        'username' => 'The provided credentials do not match our records.',
    ]);
}

public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
}

public function index()
    {
      $admin=User::all()->first();
      return view('admin.profile',compact('admin'));
    }


 public function edit(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'username'=>'required',
            'password'=>'required'
            
        ]);

        $admin=User::all()->first();
        $admin->name=$request->name;
        $admin->username=$request->username;
        $admin->password=$request->password;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $destinationPath = 'assets/img/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($destinationPath), $profileImage);
                $admin->image = $destinationPath . $profileImage;
            }

        $admin->update();
        $admin->save();
        return redirect('/profile');
}
}