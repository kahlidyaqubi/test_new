@extends("layouts._account_layout")

@section("title", "تغيير كلمة المرور")


@section("content")
<form method="post" action="/account/home/change-password">
    {{csrf_field()}}
  <div class="form-group row">
    <label for="old_password" class="col-sm-2 col-form-label">كلمة المرور الحالية</label>
    <div class="col-sm-5">
      <input type="password" autofocus class="form-control" value="{{old("old_password")}}" id="old_password" name="old_password">
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label"> كلمة المرور</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" value="{{old("password")}}" id="password" name="password">
    </div>
  </div>
  <div class="form-group row">
    <label for="password_confirmation" class="col-sm-2 col-form-label">تأكيد  كلمة المرور</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" value="{{old("password_confirmation")}}" id="password_confirmation" name="password_confirmation">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-5 col-md-offset-2">
       <input type="submit" class="btn btn-success" value="تغيير كلمة المرور" />
        <a href="/account" class="btn btn-light">الغاء الامر</a>
    </div>
  </div>
</form>
@endsection