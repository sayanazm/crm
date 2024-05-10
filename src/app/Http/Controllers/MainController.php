<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function profile()
    {
        if (Auth::check()) {
            return view('profile');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function order()
    {
        if (Auth::check()) {
            return view('order');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function schedule()
    {
        if (Auth::check()) {
            return view('schedule');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function services()
    {
        if (Auth::check()) {
            return view('services');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function clients()
    {
        if (Auth::check()) {
            return view('clients');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }


}
