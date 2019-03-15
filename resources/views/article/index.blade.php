@extends("layouts._article_")

@section('content')
    <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider" dir="ltr">
            @foreach($last_article as $item)
                <div class="single_iteam"><a href="/article/{{$item->id}}"> <img
                                src="{{asset('/newsfile/'.$item->id.'/'.$item->imge)}}" alt=""></a>
                    <div class="slider_article">
                        <h2 style="direction: rtl"><a class="slider_tittle"
                                                      href="/article/{{$item->id}}">{{$item->title}}
                            </a></h2>
                        <p style="direction: rtl;display:block; max-width: 100%;max-height: 40px ;overflow: hidden;text-overflow: ellipsis;">
                            {{$item->summary}}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="left_content">
            @foreach($most_categoris as $item)
                <div class="single_post_content">
                    <h2><span>{{$item->name}}</span></h2>

                    <div class="single_post_content_left">
                        <ul class="spost_nav">
                            <?php $i = 0 ?>
                            @foreach($item->articles as $artical)
                                @if($i==0)
                                    <?php $i = $i + 1; ?>
                                    @continue
                                @endif
                                <li>
                                    <div class="media wow fadeInDown"><a href="/article/{{$artical->id}}"
                                                                         class="media-left"> <img width="72px"
                                                                                                  hight="72px" alt=""
                                                                                                  src="{{asset('/newsfile/'.$artical->id.'/'.$artical->imge)}}">
                                        </a>
                                        <div class="media-body"><a href="/article/{{$artical->id}}" class="catg_title">
                                                {{$artical->title}} </a></div>
                                    </div>
                                </li>
                                <?php $i = $i + 1; ?>
                            @endforeach
                        </ul>
                    </div>
                    @if($item->articles->first())

                        <div class="single_post_content_right">
                            <ul class="business_catgnav  wow fadeInDown">
                                <li>
                                    <figure class="bsbig_fig"><a href="/article/{{$item->articles->first()->id}}" class="featured_img">
                                            <img alt=""
                                                 src="{{asset('/newsfile/'.$item->articles->first()->id.'/'.$item->articles->first()->imge)}}">
                                            <span
                                                    class="overlay"></span> </a>
                                        <figcaption><a
                                                    href="/article/{{$item->articles->first()->id}}">{{$item->articles->first()->title}}</a>
                                        </figcaption>
                                        <p style="max-width: 300px;overflow: hidden;text-overflow: ellipsis;">{{$item->articles->first()->summary}}</p>
                                    </figure>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
