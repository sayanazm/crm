<?php

namespace App\Http\Controllers;

use App\Mail\OrderMailNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;

class MailController extends Controller
{
    public function basic_email() {
        $data = array('name'=>"adfgaaa qhh");

        $user = Auth::user();
        $email = $user->email;
        $name = $user->name;

        Mail::send(['text'=>'mail.mail'], $data, function($message) use ($email, $name) {
            $message->to($email, $name)->subject
            (new OrderMailNotification($email));
            $message->from('kkit1303@gmail.com','CRM project');
        });
        echo "Basic Email Sent. Check your inbox.";
    }
    public function html_email() {
        $data = array('name'=>"Virat Gandhi");
        Mail::send('mail', $data, function($message) {
            $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
            $message->from('xyz@gmail.com','Virat Gandhi');
        });
        echo "HTML Email Sent. Check your inbox.";
    }
    public function attachment_email() {
        $data = array('name'=>"Virat Gandhi");
        Mail::send('mail', $data, function($message) {
            $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
            $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
            $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
            $message->from('xyz@gmail.com','Virat Gandhi');
        });
        echo "Email Sent with attachment. Check your inbox.";
    }
}
