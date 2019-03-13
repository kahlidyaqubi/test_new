@extends("layouts._account_layout")

@section("title", "إدارة الحسابات")
@section("content")
    <span id="mybody">
        <h4>هذه الواجهة خاصة للمدراء تتيح لهم عرض جميع الحسابات في النظام</h4><br>
        <div class="row">
              <form>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="q" value="{{request('q')}}"
                               placeholder="ابحث في الإسم او البريد أو الهاتف"/>
                    </div>
                 
                 
              
                      <div class="col-sm-4">
                <button type="submit" name="theaction" title="بحث" style="width:70px;" value="search"
                        class="btn btn-primary "/>
                بحث
                          </button>
                          <button type="submit" target="_blank" name="theaction" title="طباعة" style="width:70px;"
                                  value="print" class="btn btn-primary "/>
                <i class="glyphicon glyphicon-print icon-white"></i>
                          </button>
                          <button type="submit" target="_blank" name="theaction" title="تصدير إكسل" style="width:70px;"
                                  value="excel" class="btn btn-primary "/>
                تصدير
                          </button>
            </div>
                  

                    <div class="col-sm-2">
                        <a class="btn btn-success" href="/account/account/create">اضافــة مستخدم جديد</a>
                    </div>
             </form>
            <div class="col-sm-1">
                    <form method="get"  id="idForm" action="/account/account/deletegrope">
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
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">المستخدم</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">البريد الالكتروني</th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">اسم المستخدم </th>
                        <th style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">رقم الهاتف</th>
                        <th width="25%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $a)
                        <tr>
                        <td>
						@if($a->id !=1 )<input type="checkbox" value="{{$a->id}}" v-model="checkedNames">
                            @endif
						</td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->full_name}}</td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->user->email}}</td>
                            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$a->user->name}}</td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"
                            class="text-left" dir="ltr">{{$a->mobile}}</td>
                            
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                           
                                <a class="btn btn-xs btn-info" title="الصلاحيات"
                                   href="/account/account/permission/{{$a->id}}"><i
                                            class="fa fa-lock"></i></a>
                                <a class="btn btn-xs btn-primary" title="تعديل" href="/account/account/{{$a->id}}/edit"><i
                                            class="fa fa-edit"></i></a>
<a class="btn btn-xs btn-primary" title="أخباره" href="/account/article/articleinacc/{{$a->id}}">أخباره</a>

                            @if($a->id !=1 )

                                <a class="btn btn-xs Confirm btn-danger" title="يمكن حذفه "
                                   href="/account/account/delete/{{$a->id}}"><i
                                            class="fa fa-trash"></i></a>

                            @endif
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

