<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('order');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }



}
