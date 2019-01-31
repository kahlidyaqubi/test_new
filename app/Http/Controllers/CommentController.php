<?php

namespace App\Http\Controllers;


use App\Comment;
use Illuminate\Http\Request;
use Pusher\Pusher;


class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Request $request)
    {
        $comment=Comment::create($request->all());
$id=$request->post_id;

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

        $data['comment'] = $comment->comment;
        $data['user'] = $comment->user->name;
        $pusher->trigger('my-channel', 'my-event', $data);

    return redirect("posts/$id");
    }
}