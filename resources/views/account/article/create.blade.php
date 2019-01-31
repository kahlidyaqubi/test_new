@extends("layouts._account_layout")

@section("title", "اضافة خبر جديدة ")


@section("content")
    <form method="post" id="add-contact" enctype="multipart/form-data" action="/account/article">
        {{csrf_field()}}
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">عنوان الخبر</label>
            <div class="col-sm-5">
                <input type="text" autofocus class="form-control" value="{{old("title")}}" id="title"
                       name="title">
            </div>
        </div>
        <div class="form-group row">
            <label for="category_id" class="col-sm-2 col-form-label">فئة الخبر</label>
            <div class="col-sm-5">
                <select class="form-control" name="category_id">
                    <option value="">اختر</option>
                    @foreach($categories as $category)
                        <option value="{{$category -> id}}" {{old('category_id')==$category -> id?"selected":""}}>{{$category -> name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="notes" class="col-sm-2 col-form-label">الوصف</label>
            <div class="col-sm-8">
                <textarea class="form-control" name="summary" id="summary"
                          placeholder="صف خبرك">{{old("summary")}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" style="text-align:right;">الصورة الرئيسية</label>
            <div class="col-md-8">
                <input type="file" class="form-control" name="imge"
                       placeholder="Enter text" required autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" style="text-align:right;">التفاصيل</label>
            <div class="col-md-8">
                <div name="summernote" id="summernote_1"></div>
            </div>
        </div>
        <div class="form-group row">
            <label for="active" class="col-sm-2 col-form-label">الحالة</label>
            <div class="col-sm-5">
                <label><input type="radio" {{old('active')=="1"?"checked":""}} value="1" name="active"/> فعال</label>
                <label><input type="radio" {{old('active')=="2"?"checked":""}} value="2" name="active"/>غير فعال</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-5 col-md-offset-2">
                <a id="thesubmitform" class="btn green" data-target="#myModal" data-toggle="modal" data-backdrop="static" data-keyboard="false">إضافة </a>
                <a href="/account/article" class="btn btn-light">الغاء الامر</a>
            </div>
        </div>
    </form>
@endsection

@section('css')
    @if (auth()->user()->lang == 'ar')
        <link href="/metronic-rtl/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5-rtl.css"
              rel="stylesheet"
              type="text/css"/>
    @else
        <link href="/metronic-rtl/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet"
              type="text/css"/>
    @endif
    <link href="/metronic-rtl/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="/metronic-rtl/assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet"
          type="text/css"/>
@endsection

@section('js')
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="/metronic-rtl/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"
            type="text/javascript"></script>
    <script src="/metronic-rtl/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"
            type="text/javascript"></script>
    <script src="/metronic-rtl/assets/global/plugins/bootstrap-markdown/lib/markdown.js"
            type="text/javascript"></script>
    <script src="/metronic-rtl/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js"
            type="text/javascript"></script>
    <script src="/metronic-rtl/assets/global/plugins/bootstrap-summernote/summernote.min.js"
            type="text/javascript"></script>
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/metronic-rtl/assets/pages/scripts/components-editors.min.js"
            type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        $(document).ready(function () {
            $(".note-codable").attr("name", "news");
            $("[name=files]").attr("name", "files[]");

            $('#thesubmitform').on('click', function (e) {

                $(".btn-codeview").click();
                $(".note-codable")[0].value = $(".note-codable")[0].value.replace(/(src=".*?" ?)/g, "");
                $('#add-contact').submit();
            });

        });
    </script>
@endsection