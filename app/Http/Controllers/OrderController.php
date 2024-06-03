<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Client;
use App\Models\Notification;
use App\Models\Order;
use App\Models\UserClient;
use App\Models\UserOrder;
use App\Models\UserService;
use App\Models\UserWorker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class OrderController extends Controller
{
    public function index()
    {
        $userClients = UserClient::where('user_id', Auth::id())->get();
        $userServices = UserService::where('user_id', Auth::id())->get();
        $userWorkers = UserWorker::where('user_id', Auth::id())->get();

        return view('order.order', [
            'userClients' => $userClients,
            'userServices' => $userServices,
            'userWorkers' => $userWorkers
        ]);
    }

    public function create(OrderRequest $request) //add order
    {
        $data = $request->all();
        $userId = Auth::id();
        $userOrder = $this->createOrder($data, $userId);

        return view('order.showOrder', [ $userOrder ]);
    }

    /**
     * @throws \Exception
     */
    public function createOrder(array $data, $userId)
    {
        if (empty($data['notification_start'])) {
            $data['notification_start'] = false;
        }
        if (empty($data['notification_end'])) {
            $data['notification_end'] = false;
        }
        if (empty($data['notification_reminder'])) {
            $data['notification_reminder'] = false;
        }

        $notification = Notification::create([
            'start' => $data['notification_start'],
            'end' => $data['notification_end'],
            'reminder' => $data['notification_reminder'],
        ]);

        $order = Order::create([
            'service_id' => $data['service_id'],
            'worker_id' => $data['worker_id'],
            'client_id' => $data['client_id'],
            'notification_id' => $notification->id,
            'payment_status' => $data['payment_status'],
            'order_status_id' => 1,
            'discount' => $data['discount'],
            'total' => $data['total'],
            'start' => $data['start'],
            'end' => $data['end'],
        ]);

        $user = Auth::user();
        $email = $user->email;
        $name = $user->name;
        $array = array('name'=>"CRM");

        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'user', 'user');
        $channel = $connection->channel();

        $channel->queue_declare('hello', false, false, false, false);

        $msg = new AMQPMessage($userId);
        $channel->basic_publish($msg, '', 'hello');

        echo " [x] Sent 'Hello World!'\n";

        $channel->close();
        $connection->close();

        return UserOrder::create([
            'user_id' => $userId,
            'order_id' => $order->id
        ]);

    }

    public function show(int $orderId) //show 1 order by orderId
    {
        $userId = Auth::id();
        $userOrders = UserOrder::where('order_id', $orderId)->where('user_id', $userId)->first();
        if ($userOrders) {
            if ($userOrders->user_id === $userId) {
                return view('order.showOrder', ['userOrders' => $userOrders]);
            }
        }
        return redirect('schedule');

    }

    public function edit(OrderRequest $request) //edit 1 order by orderId
    {
        $orderId = $request->get('id');

    }

    public function showDelete(int $orderId) //show confirmation form
    {

    }


}
