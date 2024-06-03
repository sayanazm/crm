<?php

namespace App\Http\Controllers;


use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Models\Service;
use App\Models\UserClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $userClients = UserClient::where('user_id', Auth::id())->get();
        return view('clients.clients', ['userClients' => $userClients, 'quantity' => 0]);
    }

    public function add(ClientRequest $request)
    {
        $data = $request->all();
        $userId = Auth::id();
        $this->create($data, $userId);

        $userClients = UserClient::where('user_id', $userId)->get();

        return view('clients.clients', ['userClients' => $userClients, 'quantity' => 0]);
    }

    public function create(mixed $data, int $userId)
    {
        $client = Client::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'patronymic' => $data['patronymic'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'comment' => $data['comment'],
        ]);

        return UserClient::create([
            'user_id' => $userId,
            'client_id' => $client->id,
        ]);
    }

    public function show(int $clientId)
    {
        $userClient = UserClient::where('client_id', $clientId)->where('user_id', Auth::id())->first();
        if (!empty($userClient)) {
            if ($userClient->user_id === Auth::id()) {
                return view('clients.showClients', ['userClient' => $userClient]);
            }
        }
        return redirect('clients');
    }

    public function edit(Request $request)
    {
        $clientId = $request->input('id');
        $client = Client::find($clientId);
        $userClient = UserClient::where('client_id', $clientId)->where('user_id', Auth::id())->first();

        if ($userClient) {
            $client->update([
                'name' => $request->get('name'),
                'surname' => $request->get('surname'),
                'patronymic' => $request->get('patronymic'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'comment' => $request->get('comment'),
                'birth_date' => $request->get('birth_date'),
            ]);
        }
        return view('clients.showClients', ['userClient' => $userClient]);
    }

    public function showDelete(int $clientId)
    {
        $userClient = UserClient::where('client_id', $clientId)->where('user_id', Auth::id())->first();
        if (!empty($userClient)) {
            if ($userClient->user_id === Auth::id()) {
                return view('clients.showDeleteClients', ['userClient' => $userClient]);
            }
        }
        return redirect('clients');
    }

    /**
     * @throws \Throwable
     */
    public function delete(int $clientId)
    {
        $userClient = UserClient::where('client_id', $clientId)->where('user_id', Auth::id())->first();

        if (!empty($userClient)) {
            if ($userClient->user_id === Auth::id()) {
                $client = Client::find($clientId);
                $client->delete();
                return redirect('clients');
            }
        }
        return redirect('clients');

    }

}
