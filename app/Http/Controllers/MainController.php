<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use App\Models\UserOrder;
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

        $user = Auth::user();
        $userOrders = UserOrder::where('user_id', Auth::id())->get();

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

        foreach ($userOrders as $userOrder) {
            $dateTimeOrder = new \DateTime($userOrder->order->start);
            $dateOrder = $dateTimeOrder->format('Y-m-d');

            if ($dateOrder === $week['dateToday']) {
                $ordersToday[] = $userOrder;
            } elseif ($dateOrder === $week['dateTomorrow']) {
                $ordersTomor[] = $userOrder;
            } elseif ($dateOrder === $week['thirdDay']) {
                $ordersThirdDay[] = $userOrder;
            } elseif ($dateOrder === $week['fourthDay']) {
                $ordersFourthDay[] = $userOrder;
            } elseif ($dateOrder === $week['fifthDay']) {
                $ordersFifthDay[] = $userOrder;
            } elseif ($dateOrder === $week['sixthDay']) {
                $ordersSixthDay[] = $userOrder;
            } elseif ($dateOrder === $week['seventhDay']) {
                $ordersSeventhDay[] = $userOrder;
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

}
