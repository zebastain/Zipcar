<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Borrow;

class UserController extends Controller
{
    public function index()
    {
        return view('account');

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
}