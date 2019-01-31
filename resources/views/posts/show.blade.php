@extends("layouts._account_layout")

@section("title", "عرض الخبر")
@section("content")
<div>
    {{$post->artical}}
</div>
<form method="post" enctype="multipart/form-data" action="/comment">
    {{csrf_field()}}
    <div class="form-group row">
        <label for="comment" class="col-sm-2 col-form-label">أضف تعليقا</label>
        <div class="col-sm-5">
            <textarea name="comment">{{old("comment")}}</textarea>
        </div>
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <input type="hidden" name="user_id" value="{{$post->user->id}}">
    </div>


    <div class="form-group row">
        <div class="col-sm-5 col-md-offset-2">
            <input type="submit" class="btn btn-success" value="اضافة" />
            <a href="/posts/{{$post->id}}" class="btn btn-light">الغاء الامر</a>
        </div>
    </div>
</form>
@foreach($post->comments as $comment)
    <p>{{$comment->comment}}</p><span>{{$comment->user->name}}</span>
@endforeach
<div id="main"></div>
@endsection
@section('css')
@endsection
@section('js')
    <script src="https://js.pusher.com/4.3/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('f95a8f56bcfd8de728c8', {
            cluster: 'ap2',
            forceTLS: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            //alert(JSON.stringify(data));
            var div = document.createElement("p");
            console.log(data);
            div.innerHTML = "<p>"+data.comment+"</p><span>"+data.user+"</span>";

            document.getElementById("main").appendChild(div);
        });
    </script>
@endsection

