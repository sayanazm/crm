<?php

namespace App\Http\Controllers;


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
        if (Auth::check()) {

            $userClients = UserClient::where('user_id', Auth::id())->get();

            return view('clients.clients', ['userClients' => $userClients, 'quantity' => 0]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function add(Request $request)
    {
        if (Auth::check()) {
            $data = $request->all();
            $userId = Auth::id();
            $this->create($data, $userId);

            $userClients = UserClient::where('user_id', $userId)->get();

            return view('clients.clients', [ 'userClients' => $userClients , 'quantity' => 0 ] );
        }
        return redirect('login')->with('error', 'You are not allowed to access');
    }
    public function create(mixed $data, int $userId)
    {
        $client = Client::create([
            'user_id' => $userId,
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

    public function show(int $id)
    {
        if (Auth::check()) {

            $client = Client::find($id);

            if (!empty($client)) {
                if ($client->user_id === Auth::id()) {
                    return view('clients.showClients', ['client' => $client]);
                } else {
                    return redirect('clients');
                }
            } else {
                return redirect('clients');
            }
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function edit(Request $request, int $id)
    {
        if (Auth::check()) {
            $userId = Auth::id();

            $client = Client::find($id);

            $client->update([
                'user_id' => $userId,
                'name' => $request->get('name'),
                'surname' => $request->get('surname'),
                'patronymic' => $request->get('patronymic'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'comment' => $request->get('comment'),
                'birth_date' => $request->get('birth_date'),
            ]);

            return view('clients.showClients', ['client' => $client]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function showDelete(int $id)
    {
        if (Auth::check()) {

            $client = Client::find($id);

            if (!empty($client)) {
                if ($client->user_id === Auth::id()) {
                    return view('clients.showDeleteClients', ['client' => $client]);
                }
            }
            return redirect('clients');

        }
        return redirect('login')->with('error', 'You are not allowed to access');
    }

    /**
     * @throws \Throwable
     */
    public function delete(int $id)
    {
        if (Auth::check()) {

            $client = Client::find($id);

            if (!empty($client)) {
                if ($client->user_id === Auth::id()) {
                    $userClient = UserClient::find($id);

                    DB::beginTransaction();
                    $userClient->delete();
                    $client->delete();
                    if (empty(UserClient::find($id)) && empty(Client::find($id))) {
                        DB::commit();
                    } else {
                        DB::rollBack();
                    }
                    return redirect('clients');
                }
            }
            return redirect('clients');
        }
        return redirect('login')->with('error', 'You are not allowed to access');
    }

}
