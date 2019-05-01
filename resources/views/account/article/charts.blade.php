@extends("layouts._account_layout")

@section("title", "رسمة الأخبار")

<!--*******************************/-->
@section("content")
    <div class="row">
        <form>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="q" value="{{request('q')}}"
                       placeholder="ابحث في اسم الخبر أو اسم القسم"/>
            </div>

            <div class="col-sm-3">
                <select class="form-control" name="category_id">
                    <option value="">جميع الأقسام</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                                @if(request('category_id')== $category->id)selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-1">
                <input type="submit" style="width:70px;" value="بحث" class="btn btn-primary"/>
            </div>
 </form>


    </div>
    <div id="chartdiv"></div>
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
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

    <!-- Chart code -->
    <script>
        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart instance
        var chart = am4core.create("chartdiv", am4charts.XYChart);
        chart.scrollbarX = new am4core.Scrollbar();

        // Add data
        chart.data = {!! $articles !!};

        // Create axes
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "name";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 30;
        categoryAxis.renderer.labels.template.horizontalCenter = "right";
        categoryAxis.renderer.labels.template.verticalCenter = "middle";
        categoryAxis.renderer.labels.template.rotation = 270;
        categoryAxis.tooltip.disabled = true;
        categoryAxis.renderer.minHeight = 110;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.renderer.minWidth = 50;

        // Create series
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.sequencedInterpolation = true;
        series.dataFields.valueY = "articles_count";
        series.dataFields.categoryX = "name";
        series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
        series.columns.template.strokeWidth = 0;

        series.tooltip.pointerOrientation = "vertical";

        series.columns.template.column.cornerRadiusTopLeft = 10;
        series.columns.template.column.cornerRadiusTopRight = 10;
        series.columns.template.column.fillOpacity = 0.8;

        // on hover, make corner radiuses bigger
        var hoverState = series.columns.template.column.states.create("hover");
        hoverState.properties.cornerRadiusTopLeft = 0;
        hoverState.properties.cornerRadiusTopRight = 0;
        hoverState.properties.fillOpacity = 1;

        series.columns.template.adapter.add("fill", function(fill, target) {
            return chart.colors.getIndex(target.dataItem.index);
        });

        // Cursor
        chart.cursor = new am4charts.XYCursor();
    </script>
@endsection

