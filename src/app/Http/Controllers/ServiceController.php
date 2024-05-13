<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use App\Models\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ServiceController
{

    public function index()
    {
        if (Auth::check()) {

            $userServices = UserService::where('user_id', Auth::id())->get();

            return view('services.services', [ 'userServices' => $userServices , 'quantity' => 0 ] );
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function addService(Request $request)
    {
        if (Auth::check()) {
            $data = $request->all();
            $userId = Auth::id();
            $this->createUserService($data, $userId);

            $userServices = UserService::where('user_id', $userId)->get();

            return view('services.services', [ 'userServices' => $userServices , 'quantity' => 0 ] );
        }
        return redirect('login')->with('error', 'You are not allowed to access');
    }

    public function createUserService($data, $userId)
    {
        $service = Service::create([
            'user_id' => $userId,
            'name' => $data['name'],
            'price' => $data['price'],
            'description' => $data['description'],
        ]);

        return UserService::create([
            'service_id' => $service->id,
            'user_id' => $userId,
        ]);
    }

    public function show(int $id)
    {
        if (Auth::check()) {

            $service = Service::find($id);

            if (!empty($service)) {
                if ($service->user_id === Auth::id()) {
                    return view('services.showService', ['service' => $service]);
                }
            } else {
                return redirect('services');
            }
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function edit(Request $request, int $id)
    {
        $userId = Auth::id();

        $service = Service::find($id);

        $service->update([
            'user_id' => $userId,
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
        ]);

        return view('services.showService', ['service' => $service]);
    }

    public function showDelete(int $id)
    {
        if (Auth::check()) {

            $service = Service::find($id);

            if (!empty($service)) {
                if ($service->user_id === Auth::id()) {
                    return view('services.showDeleteService', ['service' => $service]);
                }
            } else {
                return redirect('services');
            }

        }
        return redirect('login')->with('error', 'You are not allowed to access');
    }
    public function delete(int $id)
    {
        if (Auth::check()) {

            $service = Service::find($id);

            if (!empty($service)) {
                if ($service->user_id === Auth::id()) {
                    $service->delete();
                    return redirect('services');
                }
            } else {
                return redirect('services');
            }
        }
        return redirect('login')->with('error', 'You are not allowed to access');
    }

}
