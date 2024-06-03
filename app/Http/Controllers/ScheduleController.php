<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleRequest;
use App\Models\UserOrder;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        $userSortedOrders = UserOrder::where('user_id', Auth::id())->get();
        return view('schedule', ['userSortedOrders' => $userSortedOrders, 'quantity' => 0]);
    }

    public function show(ScheduleRequest $request)
    {
        $firstDatetime = $request->get('first_datetime');
        $lastDatetime = $request->get('last_datetime');

        $userOrders = UserOrder::where('user_id', Auth::id())->get();

        $userSortedOrders = [];

        foreach ($userOrders as $userOrder) {
            if ($firstDatetime < $userOrder->order->start && $lastDatetime > $userOrder->order->end) {
                $userSortedOrders[] = $userOrder;
            }
        }
        return view('schedule', ['userSortedOrders' => $userSortedOrders, 'quantity' => 0, 'firstDatetime' => $firstDatetime, 'lastDatetime' => $lastDatetime]);
    }

}
