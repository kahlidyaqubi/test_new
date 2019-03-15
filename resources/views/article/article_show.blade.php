@extends("layouts._article_")

@section('content')

    <span id='thefilecode'
          data-html='{{Storage::disk('uploads')->get('/newsfile/' . $item->id . '/' . $item->news)}}'></span>

    <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
            <div class="single_page">
                <ol class="breadcrumb">
                    <li><a href="/">الرئيسية</a></li>
                    <li><a href="#">{{$item->category->name}}</a></li>
                </ol>
                <h1>{{$item->title}}</h1>
                <div class="post_commentbox"><a href="#"><i class="fa fa-user"></i>{{$item->account->full_name}}
                    </a><span> </span> <a><i class="fa fa-calendar"></i>{{$item->created_at->format('H:m:s')}}</a> <a
                            href="#"><i class="fa fa-tags"></i>{{$item->category->name}}</a></div>
                <div class="single_page_content"><img class="img-center"
                                                      src="{{asset('/newsfile/'.$item->id.'/'.$item->imge)}}" alt="">
                    <p id="newscontact" style="max-width: 70%">

                    </p>
@foreach($item->comments as $comment)
    @if($comment->status==1)
                    <div>
                        <hr>
                        <blockquote>{{$comment->comment}}
                            <h5>{{$comment->writer}} <span>{{$comment->created_at}}</span></h5>
                        </blockquote>

                    </div>
                        @endif
    @endforeach
                    <div class="contact_area col-lg-3" style="width: 60%">
                        <h2>أضف تعليقاً</h2>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br />
                        @endif
                        <form action="/article/{{$item->id}}" method="post" class="contact_form">
                            @csrf
                            <input type="hidden" name="article_id" value="{{$item->id}}">
                            <input class="form-control col-lg-3 col-md-3" name="writer" style="width: 60%" type="text" placeholder="الإسم"><br>
                            <textarea class="form-control" cols="15" rows="3" name="comment" placeholder="المحتوى"></textarea>
                            <input type="submit" value="أضف تعليقا">
                        </form>
                    </div>
                </div>
                <div class="social_link">
                    <ul class="sociallink_nav">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
                <div class="related_post">
                    <h2>الأخبار المشابهة <i class="fa fa-thumbs-o-up"></i></h2>
                    <ul class="spost_nav wow fadeInDown animated">
                        @foreach($most_article_insection as $article_item)
                            <li>
                                <div class="media"><a class="media-left" href="/article/{{$article_item->id}}"> <img width="72px"
                                                                                                       hight="72px"
                                                                                                       src="{{asset('/newsfile/'.$article_item->id.'/'.$article_item->imge)}}"
                                                                                                       alt=""> </a>
                                    <div class="media-body"><a class="catg_title"
                                                               href="/article/{{$article_item->id}}"> {{$article_item->title}}</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {

            $("#newscontact").append($("#thefilecode").attr('data-html'));
            $("#newscontact img").css("width", "100%");

        });
    </script>
@endsection
