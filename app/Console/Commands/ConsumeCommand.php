<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class ConsumeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rabbitmq:consume';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Consume a rabbitmq queue';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'user', 'user');
        $channel = $connection->channel();

        $channel->queue_declare('hello', false, false, false, false);

        echo " [*] Waiting for messages. To exit press CTRL+C\n";

        $callback = function (AMQPMessage $msg) {
            $userId = $msg->body;
            $user = User::find($userId);
            $email = $user->email;
            $name = $user->name;
            $array = ['name' => "crm"];

            Mail::send(['text'=>'mail.mail'], $array, function($message) use ($email, $name) {
                $message->to($email, $name)->subject('У вас новая запись');
                $message->from('kkit1303@gmail.com','CRM project');
            });
        };

        $channel->basic_consume('hello', '', false, true, false, false, $callback);

        while ($channel->is_open()){
            $channel->wait();
        }
    }
}
