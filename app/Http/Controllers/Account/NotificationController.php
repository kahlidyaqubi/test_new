<?php

namespace App\Http\Controllers\Account;


use App\Notification;
use Illuminate\Http\Request;
use Pusher\Pusher;


class NotificationController extends BaseController
{
    public function index(Request $request)
    {
        $q = $request["q"]??"";
        $items = auth()->user()->notifications()->whereRaw("true");
        if ($q)
            $items->whereRaw("(title like ? )"
                , ["%$q%"]);

        $items->getQuery()->getQuery()->update(['read_at' => date('Y-m-d h:m:s')]);
        $items = $items->orderBy("id",'desc')->paginate(20)->appends([
            "q" => $q]);

        return view("account.notifications.index", compact('items'));
    }
     static function insert($not_body){
         $a=Notification::create($not_body);
         $items=auth()->user()->notifications()->whereNull('read_at')->get();
         $options = array(
             'cluster' => 'ap2',
             'useTLS' => true
         );
         $pusher = new \Pusher\Pusher(
             '80aa60745d8088197153',
             '15db4001ecd791fa50b3',
             '704776',
             $options
         );

         $data['type'] = $a->type;
         $data['user_id'] = $a->user_id;
         $data['title'] = $a->title;
         $data['date'] = $a->created_at->format('m/d/Y');
         $data['link'] = $a->link;
         $data['num_notif'] = count($items->toArray());
         $pusher->trigger('my-channel', 'my-event', $data);
     }
    public function store(Request $request)
    {
       /* $options = array(
            'cluster' => 'ap2',
            'useTLS' => false
        );
        $pusher = new Pusher(
            'f95a8f56bcfd8de728c8',
            'c806d81c36a7112e8f1a',
            '703924',
            $options
        );

        $data['comment'] = $comment->comment;
        $data['user'] = $comment->user->name;
        $pusher->trigger('my-channel', 'my-event', $data);*/
    }
}