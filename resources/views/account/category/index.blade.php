@extends("layouts._account_layout")

@section("title", "إدارة الأقسام")
@section("content")
    <span id="mybody">
        <div class="row">
              <form>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="q" value="{{request('q')}}"
                               placeholder="ابحث في اسم القسم"/>
                    </div>
                 
                 
              
                    <div class="col-sm-3">
                        <input type="submit" style="width:70px;" value="بحث" class="btn btn-primary"/>
                    </div>
                  

                    <div class="col-sm-2">
                        <a class="btn btn-success" href="/account/category/create">اضافــة قسم جديد</a>
                    </div>
             </form>
            <div class="col-sm-1">
                    <form method="get" id="idForm" action="/account/category/deletegrope">
                        @csrf
                        <input type="hidden" name="ids" v-model="checkedNames">
                        <a class="btn  Confirm btn-danger" href="javascript:document.forms['idForm'].submit();">حذف المحدد</a>
                    </form>
              </div>
        </div>
        <div class="mt-3"></div>
        @if($items->count()>0)
            <br/>
            <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th width="3%">&#9745;</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">#</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">اسم القسم</th>
                        <th width="25%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $a)
                        <tr>
                        <td>
						<input type="checkbox" value="{{$a->id}}" v-model="checkedNames">
						</td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->id}}</td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->name}}</td>

                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                <a class="btn btn-xs btn-primary" title="تعديل"
                                   href="/account/category/{{$a->id}}/edit"><i
                                            class="fa fa-edit"></i></a>

                           <a class="btn btn-xs Confirm btn-danger" title="يمكن حذفه "
                              href="/account/category/delete/{{$a->id}}"><i
                                       class="fa fa-trash"></i></a>
                             <a class="btn btn-xs btn-primary" title="أخباره"
                                href="/account/article/articleincat/{{$a->id}}">أخباره</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
                {{$items->links()}}
            </table>
            </div>
    </span><br>

    @else
        <br><br>
        <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
    @endif
@endsection
@section('css')
    <script src="https://unpkg.com/vue"></script>
@endsection
@section('js')
    <script type="text/javascript">
        new Vue({
            el: '#mybody',
            data: {
                checkedNames: []
            }
        })
    </script>
@endsection

