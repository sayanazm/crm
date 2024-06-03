<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
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
        $userServices = UserService::where('user_id', Auth::id())->get();

        return view('services.services', ['userServices' => $userServices, 'quantity' => 0]);

    }

    public function addService(ServiceRequest $request)
    {
        $data = $request->all();
        $userId = Auth::id();
        $this->createUserService($data, $userId);

        $userServices = UserService::where('user_id', $userId)->get();

        return view('services.services', ['userServices' => $userServices, 'quantity' => 0]);
    }

    public function createUserService(array $data, int $userId)
    {
        $service = Service::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'description' => $data['description'],
        ]);

        return UserService::create([
            'service_id' => $service->id,
            'user_id' => $userId,
        ]);
    }

    public function show(int $serviceId)
    {
        $userId = Auth::id();
        $userService = UserService::where('service_id', $serviceId)->where('user_id', $userId)->first();
        if ($userService) {
            if ($userService->user_id === $userId) {
                return view('services.showService', ['userService' => $userService]);
            }
        }
        return redirect('services');

    }

    public function edit(ServiceRequest $request)
    {
        $serviceId = $request->input('id');
        $service = Service::find($serviceId);
        $userService = UserService::where('service_id', $serviceId)->where('user_id', Auth::id())->first();
        if ($userService) {
            $service->update([
                'name' => $request->get('name'),
                'price' => $request->get('price'),
                'description' => $request->get('description'),
            ]);
        }
        return view('services.showService', ['userService' => $userService]);
    }

    public function showDelete(int $serviceId)
    {
        $userService = UserService::where('service_id', $serviceId)->where('user_id', Auth::id())->first();
        if (!empty($userService)) {
            if ($userService->user_id === Auth::id()) {
                return view('services.showDeleteService', ['userService' => $userService]);
            }
        }
        return redirect('services');

    }

    public function delete(int $serviceId)
    {
        $userService = UserService::where('service_id', $serviceId)->where('user_id', Auth::id())->first();

        if (!empty($userService)) {
            if ($userService->user_id === Auth::id()) {
                $userService->delete();
                return redirect('services');
            }
        }
        return redirect('services');

    }

}
