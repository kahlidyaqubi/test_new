@extends("layouts._article_")

@section('content')
    <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="single_sidebar">
            <h2><span>نتائج البحث</span></h2>
            <ul class="spost_nav">
                @foreach($items as $item)


                    <li>
                        <div class="media wow fadeInDown"><a href="/article/{{$item->id}}"
                                                             class="media-left">
                                <img width="72px" hight="72px" alt=""
                                     src="{{asset('/newsfile/'.$item->id.'/'.$item->imge)}}"> </a>
                            <div class="media-body"><a href="/article/{{$item->id}}"
                                                       class="catg_title">{{$item->title}}</a></div>
                        </div>
                    </li>
                @endforeach

            </ul>
            <div>
                {{$items->links()}}
            </div>
        </div>
    </div>
@endsection
