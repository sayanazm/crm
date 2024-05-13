<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use DateTimeZone;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

    /**
     * @throws Exception
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $orders = Order::where('user_id', $user['id'])->get();

            $moscow_timezone = new DateTimeZone('Europe/Moscow');

            $dateTimeToday = new \DateTime('today', $moscow_timezone);
            $dateTimeTomorrow = new \DateTime('tomorrow', $moscow_timezone);
            $dateTime3day = new \DateTime('tomorrow + 1day', $moscow_timezone);
            $dateTime4day = new \DateTime('tomorrow + 2day', $moscow_timezone);
            $dateTime5day = new \DateTime('tomorrow + 3day', $moscow_timezone);
            $dateTime6day = new \DateTime('tomorrow + 4day', $moscow_timezone);
            $dateTime7day = new \DateTime('tomorrow + 5day', $moscow_timezone);

            $week = [
                'dateToday' => $dateTimeToday->format('Y-m-d'),
                'dateTomorrow' => $dateTimeTomorrow->format('Y-m-d'),
                'thirdDay' => $dateTime3day->format('Y-m-d'),
                'fourthDay' => $dateTime4day->format('Y-m-d'),
                'fifthDay' => $dateTime5day->format('Y-m-d'),
                'sixthDay' => $dateTime6day->format('Y-m-d'),
                'seventhDay' => $dateTime7day->format('Y-m-d'),
            ];

            $ordersToday = [];
            $ordersTomor = [];
            $ordersThirdDay = [];
            $ordersFourthDay = [];
            $ordersFifthDay = [];
            $ordersSixthDay = [];
            $ordersSeventhDay = [];

            foreach ($orders as $order) {
                $dateTimeOrder = new \DateTime($order->start_order);
                $dateOrder = $dateTimeOrder->format('Y-m-d');

                if ( $dateOrder === $week['dateToday']) {
                    $ordersToday[] = $order;
                } elseif ($dateOrder === $week['dateTomorrow']) {
                    $ordersTomor[] = $order;
                } elseif ($dateOrder === $week['thirdDay']) {
                    $ordersThirdDay[] = $order;
                } elseif ($dateOrder === $week['fourthDay']) {
                    $ordersFourthDay[] = $order;
                } elseif ($dateOrder === $week['fifthDay']) {
                    $ordersFifthDay[] = $order;
                } elseif ($dateOrder === $week['sixthDay']) {
                    $ordersSixthDay[] = $order;
                } elseif ($dateOrder === $week['seventhDay']) {
                    $ordersSeventhDay[] = $order;
                }
            }

            return view('main', [
                    'user' => $user,
                    'week' => $week,
                    'ordersToday' => $ordersToday,
                    'ordersTomor' => $ordersTomor,
                    'ordersThirdDay' => $ordersThirdDay,
                    'ordersFourthDay' => $ordersFourthDay,
                    'ordersFifthDay' => $ordersFifthDay,
                    'ordersSixthDay' => $ordersSixthDay,
                    'ordersSeventhDay' => $ordersSeventhDay,
                ]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function profile()
    {
        if (Auth::check()) {
            return view('profile');
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

    public function clients()
    {
        if (Auth::check()) {
            return view('clients');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }


}
