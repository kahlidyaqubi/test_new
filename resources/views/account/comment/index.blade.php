@extends("layouts._account_layout")

@section("title", "إدارة التعليقات")
@section("content")
    <span id="mybody">
        <div class="row">
              <form>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="q" value="{{request('q')}}"
                               placeholder="ابحث في التعليقات"/>
                    </div>
<div class="col-sm-3">
                <select name="status" class="form-control">
                    <option value="">جميع التعليقات</option>
                    <option {{request('status')=="1"?"selected":""}} value="1">المسموح بها</option>
                    <option {{request('status')=="2"?"selected":""}} value="2">الغير مسموح</option>
                </select>
            </div>
              
                    <div class="col-sm-1">
                        <input type="submit" style="width:70px;" value="بحث" class="btn btn-primary"/>
                    </div>
             </form>
            <div class="col-sm-1">
                    <form method="get" action="/account/comment/deletegrope">
                        @csrf
                        <input  type="hidden" name="ids" v-model="checkedNames">
                        <input v-if="checkedNames!=''" type="submit" class="btn btn-danger" value="حذف المحدد">
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
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">التعليق</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">الخبر</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">الحالة</th>
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
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->comment}}</td>
                            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><a href="#">{{$a->article->title}}</a></td>
                        <td ><input  class="cbActive" type="checkbox" {{$a->status==1?"checked":""}} value="{{$a->id}}"/>
                        </td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">

                           <a class="btn btn-xs Confirm btn-danger" title="يمكن حذفه "
                                       href="/account/comment/delete/{{$a->id}}"><i
                                                class="fa fa-trash"></i></a>

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
    <script>
        $(function () {
            $(".cbActive").click(function () {
                var id = $(this).val();
                $.ajax({
                    url:"/account/comment/active/" + id,
                    data:{_token:'{{ csrf_token() }}'},
                    error : function (jqXHR, textStatus, errorThrown) {
                        // User Not Logged In
                        // 401 Unauthorized Response
                        window.location.href = "/account/comment";
                    },
                });
            });
        });
    </script>
@endsection

