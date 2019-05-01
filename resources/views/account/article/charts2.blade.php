@extends("layouts._account_layout")

@section("title", "رسمة الأخبار")

<!--*******************************/-->
@section("content")
    <div id="app">
    <div class="row" >
        <form>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="q" v-model="q"
                       placeholder="ابحث في اسم الخبر أو اسم القسم"/>
            </div>

            <div class="col-sm-3">
                <select class="form-control" v-model="category_id">
                    <option value="">جميع الأقسام</option>
                    <option v-for="category in categories" :value="category.id">@{{category.name}}</option>
                </select>
            </div>

            <div class="col-sm-1">
                <input type="submit" @click.prevent="doSearch" style="width:70px;" value="بحث" class="btn btn-primary"/>
            </div>
 </form>


    </div>
    <div id="chartdiv"></div>
    </div>
@endsection
<!--*******************************/-->
@section('css')
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>
@endsection
<!--*******************************/-->
@section('js')

    <script src="/js/charts.js"></script>
@endsection

