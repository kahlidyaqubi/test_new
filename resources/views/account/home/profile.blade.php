@extends("layouts._account_layout")

@section("title", "تعديل حساب $item->full_name")


@section("content")
<?php
    if ($item['image'] == null) {
        $image = "http://placehold.it/300/300/F00";
    } else {
        if (file_exists(public_path() . '/storage/images/' . $item['id'] . '/' . $item['image']) && $item['image'] != null)
            $image = asset('/storage/images/' . $item['id'] . '/' . $item['image']);
        else
            $image = "http://placehold.it/300/300";
    }
    ?>
    <form method="post" enctype="multipart/form-data" action="/account/account/profile/{{$item['id']}}" enctype="multipart/form-data">
        {{csrf_field()}}
        @method('patch')
        <div class="profile-userpic">
                        <img src="{{$image}}" class="img-responsive"
                             alt="" style="width:180px;height:175px;margin: 1px"> 
        </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
        <br>
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-job"><input type="file" name="imge" id="exampleInputFile"></div>
                    </div>
<br>
        <div class="form-group row">
            <label for="full_name" class="col-sm-2 col-form-label">الإسم كاملا</label>
            <div class="col-sm-5">
                <input type="text" autofocus class="form-control" value="{{$item["full_name"]}}" id="full_name"
                       name="full_name">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">البريد الالكتروني</label>
            <div class="col-sm-5">
                <input type="email" class="form-control" value="{{$item->user->email}}" id="email" name="email">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">اسم المستخدم</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" value="{{$item->user->name}}" id="name" name="name">
            </div>
        </div>
        <div class="form-group row">
            <label for="mobile" class="col-sm-2 col-form-label"> رقم الهاتف</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" value="{{$item["mobile"]}}" id="mobile" name="mobile">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-5 col-md-offset-2">
                <input type="submit" class="btn btn-success" value="تعديل"/>
                <a href="/account" class="btn btn-light">الغاء الامر</a>
            </div>
        </div>
    </form>
@endsection
@section('css')
    <link href="{{asset('metronic-rtl/assets/pages/css/profile-rtl.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection