@extends("layouts._account_layout")

@section("title", "اضافة حساب جديد ")


@section("content")
    <form method="post" enctype="multipart/form-data" action="/account/account">
        {{csrf_field()}}
        <div class="form-group row">
            <label for="full_name" class="col-sm-2 col-form-label">الإسم كاملا<span style= 'color:red;font-size: 18px'>*</span></label>
            <div class="col-sm-5">
                <input type="text" autofocus class="form-control" value="{{old("full_name")}}" id="full_name" name="full_name">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">البريد الالكتروني<span style= 'color:red;font-size: 18px'>*</span></label>
            <div class="col-sm-5">
                <input type="email" class="form-control" value="{{old("email")}}" id="email" name="email">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">اسم المستخدم<span style= 'color:red;font-size: 18px'>*</span></label>
            <div class="col-sm-5">
                <input type="text" class="form-control" value="{{old("name")}}" id="name" name="name">
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">كلمة المرور<span style= 'color:red;font-size: 18px'>*</span></label>
            <div class="col-sm-5">
                <input type="password" class="form-control" value="{{old("password")}}" id="password" name="password">
            </div>
        </div>
        <div class="form-group row">
            <label for="mobile" class="col-sm-2 col-form-label"> رقم الهاتف</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" value="{{old("mobile")}}" id="mobile" name="mobile">
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-sm-5 col-md-offset-2">
                <input type="submit" class="btn btn-success" value="اضافة" />
                <a href="/account/account" class="btn btn-light">الغاء الامر</a>
            </div>
        </div>
    </form>
@endsection