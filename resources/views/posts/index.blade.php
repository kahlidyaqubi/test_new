@extends("layouts._account_layout")

@section("title", "إدارة الحسابات")
@section("content")
    <a href="/posts/create">اضف جديد</a>
    @foreach($posts as $post)
        <p>{{$post->artical}}</p>
        <a href="/posts/{{$post->id}}" >عرض </a>
    @endforeach
@endsection

