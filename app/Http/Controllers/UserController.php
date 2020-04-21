<?php

namespace App\Http\Controllers;
use App\Borrow;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return view('account', ['user' => Auth::user()]);
    }

    public function delete($id)
    {
        if (count(Borrow::where('user', Auth::id())->get()) == 0 ){
            $user = User::findOrFail($id);
            $user->delete();
            return 1;
        }else{
            return 0;
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'email' => 'required|unique:users,email,'.Auth::id().',username|email'
        ]);
        $filename = "None";
        if ($request->hasFile('picture')){
            if ($user->profile_picture !== 'images/profile_pictures/default.png'){
                Storage::delete($user->profile_picture);
            }
            $filename = Auth::id() . '_profilepic' . time() . '.' .  $request->picture->getClientOriginalExtension();
            $request->picture->storeAs('images/profile_pictures', $filename);
            $user->profile_picture = 'images/profile_pictures/' . $filename;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return back();
    }

}