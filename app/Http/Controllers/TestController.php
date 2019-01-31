<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pusher\Pusher;

class TestController extends Controller
{
    //
    function index(){
        return view('test');
    }
    function send(){
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => false
        );
        $pusher = new Pusher(
            'f95a8f56bcfd8de728c8',
            'c806d81c36a7112e8f1a',
            '703924',
            $options
        );

        $data['message'] = 'hello world';
        $pusher->trigger('my-channel', 'my-event', $data);
    }
}
