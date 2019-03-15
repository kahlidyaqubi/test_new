<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>الرأي الصادق</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
    <link href="{{asset('metronic-rtl/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css')}}"
          rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('metronic-rtl/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}"
          rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('sadeq/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('sadeq/assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('sadeq/assets/css/font.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('sadeq/assets/css/li-scroller.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('sadeq/assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('sadeq/assets/css/jquery.fancybox.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('sadeq/assets/css/theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('sadeq/assets/css/style.css')}}">
    <!--[if lt IE 9]>
    <script src="{{asset('sadeq/assets/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('sadeq/assets/js/respond.min.js')}}"></script>
    <![endif]-->
    <style type="text/css">

        *, h1, h3, h4, a {
            font-family: 'El Messiri', sans-serif !important;
            font-family: 'Open Sans', sans-serif;
        }
         a>span ,a>i ,h2>i {
            font-family: 'FontAwesome' !important;
        }

       /* .breadcrumb > li, .pagination {
            display: block;

        }*/
    </style>
</head>
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
                        <label class="col-form-label" style="color: #4C6788">الايميل</label>
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

<body>
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
    <header id="header">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="header_top">
                    <div class="header_top_left">
                        <ul class="top_nav">
                            <li><a href="/">الرئيسية</a></li>
                            <li><a href="/about">من نحن</a></li>
                            <li><a href="/about">اتصل بنا</a></li>
                            <li>
                                @if(auth()->user())
                                    <a  href="/account">لوحة التحكم</a>
                                @else
                                <a  href="#" data-toggle="modal" data-target="#myModal">تسجيل الدخول</a>
                            @endif
                            </li>
                        </ul>
                    </div>
                    <div class="header_top_left">
                        <p color="#fff">{{date("D, M, Y")}} <span id="txt"></span></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="header_bottom">
                    <div class="logo_area"><a href="/" class="logo"><img
                                    src="{{asset('sadeq/images/logo.jpg')}}" alt=""></a></div>
                    <div class="add_banner"><a href="#"><img src="{{asset('/sadeq/images/addbanner_728x90_V1.jpg')}}"
                                                             alt=""></a></div>
                </div>
            </div>
        </div>
    </header>
    <section id="navArea">
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav main_nav header_top_left" style="width: 62%;">
                    <li class="active">
                        <a href="/"><span class="fa fa-home desktop-home"></span><span
                                    class="mobile-show">Home</span></a>
                    </li>
                    @foreach($most_categoris as $cat)
                        <li><a href="/section/{{$cat->id}}">{{$cat->name}}</a></li>
                    @endforeach
                </ul>
                <form method="get" action="/search/" class="form-inline  header_top_left " style="width: 33%; float:left;margin-top: .7%">
                    <input class="form-control mr-sm-2 " type="search" placeholder="بحث" name="q" aria-label="search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">البحث</button>
                </form>
            </div>
        </nav>
    </section>
    <section id="newsSection">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="latest_newsarea"><span>آخر الأخبار</span>
                    <ul id="ticker01" class="news_sticker">
                        @foreach($last_article as $item)
                            <li><a href="/article/{{$item->id}}"><img src="{{asset('/newsfile/'.$item->id.'/'.$item->imge)}}"
                                                 alt="">{{$item->title}}
                                </a></li>
                        @endforeach
                    </ul>
                    <div class="social_area">
                        <ul class="social_nav">
                            <li class="facebook"><a href="#"></a></li>
                            <li class="twitter"><a href="#"></a></li>
                            <li class="flickr"><a href="#"></a></li>
                            <li class="pinterest"><a href="#"></a></li>
                            <li class="googleplus"><a href="#"></a></li>
                            <li class="vimeo"><a href="#"></a></li>
                            <li class="youtube"><a href="#"></a></li>
                            <li class="mail"><a href="#"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="sliderSection">
        <div class="row">


            @yield('content')


            <div class="col-lg-4 col-md-4 col-sm-4">
                <aside class="right_content">
                    <div class="single_sidebar">
                        <h2><span>الأكثر تعليقا</span></h2>
                        <ul class="spost_nav">
                            @foreach($most_comment_article as $item)


                                <li>
                                    <div class="media wow fadeInDown"><a href="/article/{{$item->id}}"
                                                                         class="media-left">
                                            <img width="72px" hight="72px" alt=""
                                                 src="{{asset('/newsfile/'.$item->id.'/'.$item->imge)}}"> </a>
                                        <div class="media-body"><a href="/article/{{$item->id}}"
                                                                   class="catg_title">{{$item->title}}</a></div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="single_sidebar">
                        <h2><span>أحدث الأخبار</span></h2>
                        <ul class="spost_nav">
                            @foreach($last_article as $item)


                                <li>
                                    <div class="media wow fadeInDown"><a href="/article/{{$item->id}}"
                                                                         class="media-left">
                                            <img width="72px" hight="72px" alt=""
                                                 src="{{asset('/newsfile/'.$item->id.'/'.$item->imge)}}"> </a>
                                        <div class="media-body"><a href="/article/{{$item->id}}"
                                                                   class="catg_title">{{$item->title}}</a></div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="single_sidebar">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab"
                                                                      data-toggle="tab">الأقسام</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="category">
                                <ul>
                                    @foreach($all_categoris as $cat)
                                        <li class="cat-item"><a href="/section/{{$cat->id}}">{{$cat->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <footer id="footer">
        <div class="footer_top">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer_widget wow fadeInRightBig">
                        <h2>نبذة عنا</h2>
                        <p>موقع إخباري يهتم بنقل الحقائق كما هي وتحري الصدق كما مولاة المؤمنين من صميم عقيدتنا<address>
                            غزة,1238 شارع الشفا 25 المدينة 3333,هاتف: 123-326-789 فاكس: 123-546-567
                        </address>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer_widget wow fadeInDown">
                        <h2>الأقسام</h2>
                        <ul class="tag_nav">
                            @foreach($most_categoris as $cat)
                                <li><a href="/section/{{$cat->id}}">{{$cat->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <p class="copyright">جميع الحقوق محفوظة &copy; 2019 <a href="index.html">NewsFeed</a></p>
            <p class="developer" color="#fff">Frontend  By Wpfreeware</p>
        </div>
    </footer>
</div>

<script>
    (function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
// add a zero in front of numbers<10
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML = h + ":" + m + ":" + s;
        t = setTimeout(function () {
            startTime()
        }, 500);
    })();

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
</script>

<script src="{{asset('sadeq/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('sadeq/assets/js/wow.min.js')}}"></script>

<script src="/metronic-rtl/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('sadeq/assets/js/slick.min.js')}}"></script>
<script src="{{asset('sadeq/assets/js/jquery.li-scroller.1.0.js')}}"></script>
<script src="{{asset('sadeq/assets/js/jquery.newsTicker.min.js')}}"></script>
<script src="{{asset('sadeq/assets/js/jquery.fancybox.pack.js')}}"></script>
<script src="{{asset('sadeq/assets/js/custom.js')}}"></script>
@yield('js')
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