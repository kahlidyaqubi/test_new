<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        <li class="nav-item">
                             <a class="nav-link"  href="#" data-toggle="modal" data-target="#myModal">تسجيل دخول أجاكس</a>
                          </li>    
                        <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!---موديل الدخول--->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <!--*** modal-dialog ****-->
                        <div class="modal-dialog" role="document" style="text-align:right">
                            <div class="modal-content">
                                <!--*** modal-header ****-->
                                <div class="modal-header">
                                   <div class="modal-title" id="myModalLabel"  >
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button> 
                                        </div>
                                     <h4 >تسجيل الدخول</h4>
                                       
                                                                        
                                </div>
                                <!--*** modal-body****-->
                                <div class="modal-body">
                                    <!--**** form start ****-->
                                    <form method="POST" action="/account/login" id="formid">
                                        @csrf
                                        <div id="toerror">

                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label" style="color: #4C6788">البريد الإلكتروني أو إسم المستخدم</label>
                                            <input type="email" name="email" class="form-control" style="direction: rtl" placeholder="الايميل">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label" style="color: #4C6788">كلمة المرور</label>
                                            <input type="password" name="password" class="form-control" style="direction: rtl"
                                                   placeholder="كلمة المرور">
                                        </div>
                                        <div class="form-group">
                                             <label class="form-check-label mr-4" for="remember"
                                                   style="color: #4C6788">
                                                تذكرني
                                            </label>
                                            <input class="form-check-input mr-1" type="checkbox" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                                           
                                        </div>
                                        <a href="#" data-toggle="modal" data-target="#myModal2">نسيت كلمة المرور</a>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق
                                            </button>
                                            <button style="outline:none;" id="loginform"
                                                    type="submit" class="btn btn-primary mr-3">تسجيل
                                            </button>
                                        </div>
                                    </form>
                                    <!--**** form end ****-->
                                </div>
                                <!--**** modal-footer ****-->

                            </div>
                        </div>
    </div>
                    <!--****************************************** first  Modal end **************************************************************************-->
                    <!--****************************************** second Modal start(نسيت كلمة المرور) *******************************************************-->
                   <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" style="text-align:right" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                   <div class="modal-title" id="myModalLabel"  >
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button> 
                                        </div>
                                     <h4 >نسيت كلمة المرور</h4>
                                       
                                                                        
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/account/restpassord" id="restformid">
                                        @csrf
                                        <div id="toresterror">

                                        </div>
                                        <div class="form-group">
                                            <label style="color: #4C6788">الايميل</label>
                                            <input type="email" name="email" class="form-control"
                                                   style="direction: rtl" placeholder="الرجاء ادخال الايميل او رقم الهاتف">
                                        </div>
                                        <br><br>
                                        <button type="submit" id="restform" class="btn btn-primary">ارسال</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
    <script src="/lib/js/jquery-2.1.4.min.js"></script>
    <script>
    $(document).on('click', "#loginform", function (event) {
        event.preventDefault();
        $('#toerror').empty();
        //alert('test test');
        var form_data = $('#formid').serialize();
        var form_url = $('#formid').attr('action');
        $.ajax({
            method: 'POST',
            url: form_url,
            data: form_data,

            success: function (data_eror) {
                if (data_eror == '/account')
                    window.location.href = "/account";
                var output = '<div class="alert alert-danger alert-dismissible" style="text-align:right;direction: rtl"><ul>';
                $.each(data_eror, function (index, value) {
                    output += "<li>" + index + ": " + value + "</li>";
                });
                output += '</ul> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';

                $('#toerror').append(output);
            },
            error: function (data_eror) {
                var output = '<div class="alert alert-danger alert-dismissible"  style="text-align:right;direction: rtl"><ul>';
                $.each(data_eror, function (index, value) {

                    if (index == 'responseJSON')
                        output += "<li>" + value['message'] + "</li>";
                });
                output += '</ul> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';

                $('#toerror').append(output);
            }
        })
    });
    /********************************************************/
    $(document).on('click', "#restform", function (event) {
        event.preventDefault();
        $('#toresterror').empty();
        var form_data = $('#restformid').serialize();
        var form_url = $('#restformid').attr('action');
        $.ajax({
            method: 'POST',
            url: form_url,
            data: form_data,

            success: function (data_eror) {
                var output = '<div class="alert alert-info alert-dismissible" style="text-align:right;direction: rtl"><ul>';
                $.each(data_eror, function (index, value) {
                    if (Object.keys(data_eror).length == '1') {
                        if (index == 'success') {
                            if (value == 'true')
                                output += "<li> تم إرسال رسالة إلى بريدك لإعادة تعين كلمة المرور</li>";
                        }
                        else
                            output += "";
                    }
                    if (index == 'status') {
                        output += "<li>" + value + "</li>"
                    } else if (index == 'error') {
                        $.each(value, function (index2, value2) {
                            {
                                if (index2 == 'messages')
                                    $.each(value2, function (index3, value3) {
                                        output += "<li>" + index3 + " " + value3 + "</li>";
                                    });
                            }

                        });
                    }
                    else
                        output += "";
                });
                output += '</ul> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';

                $('#toresterror').append(output);
            },
            error: function (data_eror) {
                var output = '<div class="alert alert-danger alert-dismissible"  style="text-align:right;direction: rtl"><ul>';
                $.each(data_eror, function (index, value) {

                    if (index == 'responseJSON')
                        output += "<li>" + value['message'] + "</li>";
                });
                output += '</ul> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>';

                $('#toresterror').append(output);

            }
        })
    });


</script>
    
</body>
</html>
