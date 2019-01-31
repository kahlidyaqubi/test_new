@extends("layouts._account_layout")

@section("title", "اضافة فئة جديد ")


@section("content")
    <form method="post" enctype="multipart/form-data" action="/account/category">
        {{csrf_field()}}
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">اسم الفئة<span style= 'color:red;font-size: 18px'>*</span></label>
            <div class="col-sm-5">
                <input type="text" autofocus class="form-control" value="{{old("name")}}" id="name" name="name">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-5 col-md-offset-2">
                <input type="submit" class="btn btn-success" value="اضافة" />
                <a href="/account/category" class="btn btn-light">الغاء الامر</a>
            </div>
        </div>
    </form>
@endsection