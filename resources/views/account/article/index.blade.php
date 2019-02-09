@extends("layouts._account_layout")

@section("title", "إدارة الأخبار")
@section("content")
    <span id="mybody">
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
                  

                    <div class="col-sm-2">
                        <a class="btn btn-success" href="/account/article/create">اضافــة خبر جديد</a>
                    </div>
             </form>
            <div class="col-sm-1">
                    <form method="get" action="/account/article/deletegrope">
                        @csrf
                        <input type="hidden" name="ids" v-model="checkedNames">
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
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">عنوان الخبر</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">القسم</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">الناشر</th>
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
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->title}}</td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->category->name}}</td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->account->full_name}}</td>
                        <td><input class="cbActive" type="checkbox" {{$a->active==1?"checked":""}} value="{{$a->id}}"/>
                        </td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                <a class="btn btn-xs btn-primary" title="تعديل" href="/account/article/{{$a->id}}/edit"><i
                                            class="fa fa-edit"></i></a>
<a class="btn btn-xs btn-primary" title="تعليقاته" href="/account/comment/commentinart/{{$a->id}}">تعليقاته</a>
                           <a class="btn btn-xs Confirm btn-danger" title="يمكن حذفه "
                              href="/account/article/delete/{{$a->id}}"><i
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
                    url: "/account/article/active/" + id,
                    data: {_token: '{{ csrf_token() }}'},
                    error: function (jqXHR, textStatus, errorThrown) {
                        // User Not Logged In
                        // 401 Unauthorized Response
                        window.location.href = "/account/article";
                    },
                });
            });
        });
    </script>
@endsection

