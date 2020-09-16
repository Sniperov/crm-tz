<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function indexAccept()
    {
        return view('accept');
    }

    public function accept(Request $request)
    {
        if (Auth::user()->code == $request->input('code'))
        {
            $user = User::find(Auth::user()->id);
            $user->accepted = 1;
            $user->update();

            return redirect('/home');
        }
        return back();
    }
}
