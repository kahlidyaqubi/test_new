@extends("layouts._account_layout")

@section("title", "   صلاحيات حساب $item->full_name")


@section("content")
<form method="post" action="/account/account/permission/{{$item->id}}">
        @csrf
        <div class="form-group row">

            <div class="col-sm-5">
                <label ><input style="-ms-transform: scale(1.1);  -moz-transform: scale(1.1);  -webkit-transform: scale(1.1);   -o-transform: scale(1.1);   padding: 10px;" type="checkbox" id="#checkAll" /><b style=" padding-right: 10px; font-size: 107%;  display: inline;"> تحيد الكل</b></label>

            <?php
                $links = \DB::table("links")->where("parent_id",0)->get();
                ?>

                    <ul class="list-unstyled">
                    @foreach($links as $link)
                        <li>
						<label>
							<input {{$item->links->contains($link->id)?'checked':''}} type="checkbox"                                        
                                          name="permission[]" value="{{$link->id}}" /> <b>{{trans("my-group.$link->title")}}</b></label>
				          <?php
                            $sublinks = \DB::table("links")->where("parent_id",$link->id)->get();
                            ?>
                            <ul class="list-unstyled">
                                @foreach($sublinks as $sublink)
                                    <li>
                                        <label><input {{$item->links->contains($sublink->id)?'checked':''}}
                                                      type="checkbox" name="permission[]" value="{{$sublink->id}}" /> {{trans("my-group.$sublink->title")}}</label>
                                       
									</li>
                                @endforeach
                            </ul>                          

                        </li>
                    @endforeach
                </ul>

            </div>
        </div>


        <div class="form-group row">
            <div class="col-sm-5">
                <input type="submit" class="btn btn-success" value="حفظ" />
                <a href="/account/account" class="btn btn-light">الغاء الامر</a>
            </div>
        </div>
    </form>
@endsection


@section("js")
    <script>
        $(function(){
			
            $(":checkbox").click(function(){
                $(this).parent().next().find(":checkbox").prop("checked",$(this).prop("checked"));
                $(this).parents("ul").each(function(){
                    $(this).prev().find(":checkbox").prop("checked",$(this).find(":checked").size()>0);
                });
            });
//
            //
        });

    </script>
@endsection