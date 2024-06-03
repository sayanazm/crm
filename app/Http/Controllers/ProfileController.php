<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Service;
use App\Models\User;
use App\Models\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.editProfile', ['user' => $user]);

    }

    public function edit(ProfileRequest $request)
    {
        $user = User::where('id', Auth::id())->FirstOrFail();

        $user->patronymic = $request->get('patronymic');
        $user->update([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'phone' => $request->get('phone'),
            'patronymic' => $request->get('patronymic'),
            'email' => $request->get('email'),
            'image' => $request->get('image'),
        ]);
        return view('profile.editProfile', ['user' => $user]);

    }

    public function showDelete()
    {
        return view('profile.deleteProfile');
    }

    public function delete()
    {
        $user = Auth::user();
        $user->delete();
        redirect('login');
    }

}
