@extends("layouts._account_layout")

@section("title", "اضافة خبر جديد جديد ")


@section("content")
    <form method="post" enctype="multipart/form-data" action="/posts">
        {{csrf_field()}}
        <div class="form-group row">
            <label for="artical" class="col-sm-2 col-form-label">محتوى الخبر</label>
            <div class="col-sm-5">
            <textarea name="artical">{{old("artical")}}</textarea>
            </div>
        </div>

        
        <div class="form-group row">
            <div class="col-sm-5 col-md-offset-2">
                <input type="submit" class="btn btn-success" value="اضافة" />
                <a href="/posts" class="btn btn-light">الغاء الامر</a>
            </div>
        </div>
    </form>
@endsection