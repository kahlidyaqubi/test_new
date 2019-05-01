@extends("layouts._account_layout")

@section("title", "محادثة ")

@section('css')

    @endsection
@section("content")
    chat test
    <div id="app">

        <basic-vue-chat />
    </div>
@endsection
@section('js')
    <script src={{asset('/js/app.js')}}></script>
@endsection