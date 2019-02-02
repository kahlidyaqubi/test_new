@extends("layouts._account_layout")

@section("title", "عرض الإشعارات")
@section("content")
    <div class="row">
        <form>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="q" value="{{request('q')}}"
                       placeholder="ابحث في عنوان الاشعار"/>
            </div>


            <div class="col-sm-3">
                <input type="submit" style="width:70px;" value="بحث" class="btn btn-primary"/>
            </div>

        </form>
    </div>
    <div class="mt-3"></div>
    @if($items->count()>0)
        <br/>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">#</th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">الاشعار
                    </th>
                    <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">النوع
                    </th>
                    <th width="25%"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $a)
                    <tr>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->id}}</td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->title}}</td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->type}}</td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                            <a class="btn btn-primary" title="انتقل" href="{{$a->link}}">
                                <i class="fa fa-eye"></i></a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
                {{$items->links()}}
            </table>
        </div>
        <br>

    @else
        <br><br>
        <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
    @endif
@endsection


