@extends("layouts._account_layout")

@section("title", "".trans('my-group.change password'))


@section("content")
<form method="post" action="/account/home/change-password">
    {{csrf_field()}}
  <div class="form-group row">
    <label for="old_password" class="col-sm-2 col-form-label">{{trans('my-group.currnt password')}}</label>
    <div class="col-sm-5">
      <input type="password" autofocus class="form-control" value="{{old("old_password")}}" id="old_password" name="old_password">
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label"> {{trans('my-group.new password')}}</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" value="{{old("password")}}" id="password" name="password">
    </div>
  </div>
  <div class="form-group row">
    <label for="password_confirmation" class="col-sm-2 col-form-label">{{trans('my-group.confirm password')}}</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" value="{{old("password_confirmation")}}" id="password_confirmation" name="password_confirmation">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-5 col-md-offset-2">
       <input type="submit" class="btn btn-success" value="{{trans('my-group.change password')}}" />
        <a href="/account" class="btn btn-light">{{trans('my-group.cancel')}}</a>
    </div>
  </div>
</form>
@endsection