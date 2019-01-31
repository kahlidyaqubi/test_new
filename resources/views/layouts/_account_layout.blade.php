<?php
if (auth()->user()) {
    if (auth()->user()->lang == 'en') {
        $dir = "ltr";
        $lang = "en";
    } else {
        App\User::find(auth()->user()->id)->update(['lang'=>'ar']);
        $dir = "rtl";
        $lang = "ar";
    }
} elseif (session()->get('lang') == 'en') {
    $dir = "ltr";
    $lang = "en";
} else {
    session()->put('locale', 'ar');;
    $dir = "rtl";
    $lang = "ar";
}
?>
        <!DOCTYPE html>
<html lang="en" dir="{{$dir}}">
<head>
    <meta charset="utf-8"/>
    <title>لوحة تحكم | @yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    @if( $lang=='ar')
        <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
        <link href="{{asset('metronic-rtl/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}"
              rel="stylesheet"
              type="text/css"/>
        <link href="{{asset('metronic-rtl/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}"
              rel="stylesheet" type="text/css"/>
        <link href="{{asset('metronic-rtl/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css')}}"
              rel="stylesheet"
              type="text/css"/>
        <link href="{{asset('metronic-rtl/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css')}}"
              rel="stylesheet" type="text/css"/>
        <link href="{{asset('metronic-rtl/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet"
              type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->

        <link href="{{asset('metronic-rtl/assets/global/css/components-md-rtl.min.css')}}" rel="stylesheet"
              id="style_components" type="text/css"/>
        <link href="{{asset('metronic-rtl/assets/global/css/plugins-md-rtl.min.css')}}" rel="stylesheet"
              type="text/css"/>
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{asset('metronic-rtl/assets/layouts/layout/css/layout-rtl.min.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{asset('metronic-rtl/assets/layouts/layout/css/themes/blue-rtl.min.css')}}" rel="stylesheet"
              type="text/css" id="style_color"/>
        <link href="{{asset('metronic-rtl/assets/layouts/layout/css/custom-rtl.min.css')}}" rel="stylesheet"
              type="text/css"/>
    @else
        <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
        <link href="{{asset('metronic-rtl/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}"
              rel="stylesheet"
              type="text/css"/>
        <link href="{{asset('metronic-rtl/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}"
              rel="stylesheet" type="text/css"/>
        <link href="{{asset('metronic-rtl/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}"
              rel="stylesheet"
              type="text/css"/>
        <link href="{{asset('metronic-rtl/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}"
              rel="stylesheet" type="text/css"/>
        <link href="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet"
              type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->

        <link href="{{asset('metronic-rtl/assets/global/css/components-md.min.css')}}" rel="stylesheet"
              id="style_components" type="text/css"/>
        <link href="{{asset('metronic-rtl/assets/global/css/plugins-md.min.css')}}" rel="stylesheet"
              type="text/css"/>
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{asset('metronic-rtl/assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{asset('metronic-rtl/assets/layouts/layout/css/themes/blue.min.css')}}" rel="stylesheet"
              type="text/css" id="style_color"/>
        <link href="{{asset('assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css"
              id="style_color"/>
        <link href="{{asset('metronic-rtl/assets/layouts/layout/css/custom.min.css')}}" rel="stylesheet"
              type="text/css"/>
@endif
<!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="/lib/img/Group%20124.ico"/>
    <style type="text/css">
        *, h1, h3, h4 {
            font-family: 'Open Sans', sans-serif;
            font-family: 'El Messiri', sans-serif;
        }

        h3 {
        / / text-align: center;
            color: #2D5F8B !important;
        }

        .breadcrumb > li, .pagination {
            display: block;

        }
    </style>
</head>

@yield('css')

<body class="page-header-fixed page-sidebar-closed-hide-logo page-md">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="/account">
                <img src="/lib/img/icon-cpanel.svg" style="width: 30px;margin: 11px" alt="logo" class="logo-default "/>
                <span style="color: #C0E6F9;font-size: 18px;" class="logo-default">{{trans('my-group.C Panel')}}</span>
            </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">

            <ul class="nav navbar-nav pull-right">
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">

                        <span class="username username-hide-on-mobile">
                           {{trans('my-group.language')}} </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">

                        <li>
                            <a href="/account/account/convertlang/ar">
                                <i class="fa fa-language"></i> العربية </a>
                        </li>
                        <li>
                            <a href="/account/account/convertlang/en">
                                <i class="fa fa-language"></i> English </a>
                        </li>
                    </ul>
                </li>

            </ul>
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">
                        <?php
                        if (!Auth::guest()) {
                            Auth::user()->account->image;
                            if (Auth::user()->account->image == null) {
                                $image = "http://placehold.it/300/300";
                            } else {
                                if (file_exists(public_path() . '/storage/images/' . Auth::user()->account->id . '/' . Auth::user()->account->image) && Auth::user()->account->image != null)
                                    $image = asset('/storage/images/' . Auth::user()->account->id . '/' . Auth::user()->account->image);
                                else
                                    $image = "http://placehold.it/300/300";
                            }
                        } else
                            $image = "http://placehold.it/300/300";
                        ?>
                        <img alt="" class="img-circle" src="{{$image}}"/>
                        <span class="username username-hide-on-mobile">
                           {{ Auth::user()->account->full_name }} </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">

                        <li>
                            <a href="/account/home/change-password">
                                <i class="icon-lock"></i> {{trans('my-group.change password')}} </a>
                        </li>
                        <li>
                            <a href="/account/account/profile/{{Auth::user()->account->id}}">
                                <i class="icon-lock"></i>  {{trans('my-group.edit profile')}} </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="icon-key"></i>
                                {{trans('my-group.logout')}}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"></div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
                data-slide-speed="200" style="padding-top: 20px">
                <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                <li class="sidebar-toggler-wrapper hide">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                    <!-- END SIDEBAR TOGGLER BUTTON -->
                </li>
                <?php
                $adminId = Auth::user()->account->id;
                /*$links = \DB::table("links")->where("parent_id",0)->
                    whereRaw('id in (select link_id from admin_link where admin_id=?)',$adminId)->get();*/
                $links = Auth::user()->account->links->where("parent_id", 0);
                ?>

                @foreach($links as $link)
                    <?php
                    /*$sublinks = \DB::table("link")->
                        whereRaw('id in (select link_id from admin_link where admin_id=?)',$adminId)->where("parent_id",$link->id)->get();*/

                    $sublinks = Auth::user()->account->links->where("parent_id", $link->id);
                    ?>
                    <li class="nav-item
                               {{ strstr("/".Route::getFacadeRoot()->current()->uri(),$sublinks->first()->url)?
                                            "open":'' }} ">
                        <a href="{{$link->url}}" class="nav-link nav-toggle">
                            <i class="{{$link->icon}}"></i>
                            <span class="title">{{trans("my-group.$link->title")}}</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu"
                                {{ strstr("/".Route::getFacadeRoot()->current()->uri(),$sublinks->first()->url)?"style=display:block;":'' }}>
                            @foreach($sublinks as $sublink)
                                @if($sublink->show == 1)
                                    <li class="nav-item  ">
                                        <a href="{{$sublink->url}}" class="nav-link ">
                                            <span class="title">{{trans("my-group.$sublink->title")}}</span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endforeach

            </ul>
            <!-- END SIDEBAR MENU -->
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <h3 class="page-title"> @yield("title")
                <small>@yield("subtitle")</small>
                &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp;
                <a href="/back"> @yield("title2")</a></h3>
            <!-- END PAGE TITLE-->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <!--<ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span>Page Layouts</span>
                    </li>
                </ul>-->
            </div>
            @include("_msg")
            @yield('content')
        </div>
        <!-- END CONTENT BODY -->
    </div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> {{date("Y")}} {{trans('my-group.all copyrights reserved')}} &copy; .

    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>

<div class="modal fade" id="Confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{{trans('my-group.confirm')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{trans('my-group.do you sure to continue?')}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('my-group.close')}}</button>
                <a href="#" class="btn btn-danger">{{trans('my-group.yes, sure')}}</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Confirmserv" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">تأكيد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                تنويه بأن هذا المواطن أخذ هذه الخدمة مسبقا هل أنت متأكد؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء الامر</button>
                <a href="#" class="btn btn-danger">نعم, متأكد</a>
            </div>
        </div>
    </div>
</div>
<script src="/metronic-rtl/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/metronic-rtl/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/metronic-rtl/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="/metronic-rtl/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
        type="text/javascript"></script>
<script src="/metronic-rtl/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
        type="text/javascript"></script>
<script src="/metronic-rtl/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/metronic-rtl/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
        type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="/metronic-rtl/assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="/metronic-rtl/assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="/metronic-rtl/assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
<script src="/metronic-rtl/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script>
    $(function () {
        //$("#Confirm").modal("show");
        $(".Confirm").click(function () {
            $("#Confirm").modal("show");
            $("#Confirm .btn-danger").attr("href", $(this).attr("href"));
            return false;
        });
    });
</script>
<script>
    $(function () {
        $(".Confirmserv").click(function () {
            $("#Confirmserv").modal("show");
            $("#Confirmserv .btn-danger").attr("href", $(this).attr("href"));
            return false;
        });
    });
</script>
@yield("js")
</body>

</html>