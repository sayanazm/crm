<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkerRequest;
use App\Models\Client;
use App\Models\UserClient;
use App\Models\UserWorker;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkerController extends Controller
{
    public function index()
    {
        $userWorkers = UserWorker::where('user_id', Auth::id())->get();

        return view('workers.workers', ['userWorkers' => $userWorkers, 'quantity' => 0]);

    }

    public function add(WorkerRequest $request)
    {
        $data = $request->all();
        $userId = Auth::id();
        $this->create($data, $userId);
        $userWorkers = UserWorker::where('user_id', $userId)->get();
        return view('workers.workers', ['userWorkers' => $userWorkers, 'quantity' => 0]);
    }

    private function create(array $data, $userId)
    {
        $worker = Worker::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'patronymic' => $data['patronymic'],
            'category' => $data['category'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'comment' => $data['comment'],
            'birth_date' => $data['birth_date'],
        ]);

        return UserWorker::create([
            'user_id' => $userId,
            'worker_id' => $worker->id,
        ]);
    }

    public function show(int $workerId)
    {
        $userWorker = UserWorker::where('worker_id', $workerId)->where('user_id', Auth::id())->first();
        if (!empty($userWorker)) {
            if ($userWorker->user_id === Auth::id()) {
                return view('workers.showWorkers', ['userWorker' => $userWorker]);
            }
        }
        return redirect('workers');
    }

    public function edit(WorkerRequest $request)
    {
        $workerId = $request->input('id');
        $worker = Worker::find($workerId);
        $userWorker = UserWorker::where('worker_id', $workerId)->where('user_id', Auth::id())->first();

        if ($userWorker) {
            $worker->update([
                'name' => $request->get('name'),
                'surname' => $request->get('surname'),
                'patronymic' => $request->get('patronymic'),
                'category' => $request->get('category'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'comment' => $request->get('comment'),
                'birth_date' => $request->get('birth_date'),
            ]);
        }

        return view('workers.showWorkers', ['userWorker' => $userWorker]);

    }

    public function showDelete(int $workerId)
    {
        $userWorker = UserWorker::where('worker_id', $workerId)->where('user_id', Auth::id())->first();
        if (!empty($userWorker)) {
            if ($userWorker->user_id === Auth::id()) {
                return view('workers.showDeleteWorker', ['userWorker' => $userWorker]);
            }
        }
        return redirect('workers');
    }

    public function delete(int $workerId)
    {
        $userWorker = UserWorker::where('worker_id', $workerId)->where('user_id', Auth::id())->first();

        if (!empty($userWorker)) {
            if ($userWorker->user_id === Auth::id()) {
                $worker = Worker::find($workerId);
                $worker->delete();
            }
        }
        return redirect('workers');

    }

}
