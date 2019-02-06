@extends("layouts._account_layout")
@section("title", "".trans('my-group.control panel to')." ".$item->full_name)


@section("content")

    <div class="profile">
        <div class="tabbable-line tabbable-full-width">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab_1_1" data-toggle="tab"> {{trans('my-group.personal information')}}</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1_1">
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="list-unstyled profile-nav">
                                <li>
                                    <?php
                                    if (!Auth::guest()) {
                                        Auth::user()->account->image;
                                        if (Auth::user()->account->image == null) {
                                            $image = "http://placehold.it/300/300";
                                        } else {
                                            if (file_exists(public_path() . '/storage/images/' . Auth::user()->account->id . '/' . Auth::user()->account->image) && Auth::user()->account->image != null)
                                                $image = asset('/storage/images/' . Auth::user()->account->id . '/' . Auth::user()->account->image);
                                            else
                                                $image = "http://placehold.it/300/300";
                                        }
                                    } else
                                        $image = "http://placehold.it/300/300";
                                    ?>
                                    <img src="{{$image}}" class="img-responsive pic-bordered" alt=""/>

                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-8 profile-info">
                                    <h1 class="font-green sbold uppercase">{{ Auth::user()->account->full_name }}</h1>
                                    <p>
                                        {{trans('my-group.form this panel you can do your task')}}</p>
                                    {{trans('my-group.and you can show the articles added by you')}}
                                    <p>
                                        <a href="javascript:;"> {{auth()->user()->email}} </a>
                                    </p>
                                    <ul class="list-inline">
                                        <li>
                                            <i class="fa fa-star"></i>
                                            {{auth()->user()->email}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--end col-md-8-->

                            <!--end row-->

                            @if(1==1)
                                <div class="tabbable-line tabbable-custom-profile">

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1_11">
                                            <div class="portlet-body">
                                                <table class="table table-striped table-bordered table-advance table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>
                                                            <i class="fa fa-briefcase"></i>{{trans('my-group.article')}}
                                                        </th>
                                                        <th class="hidden-xs">
                                                            <i class="fa fa-question"></i>{{trans('my-group.category')}}
                                                        </th>
                                                        <th class="hidden-xs">
                                                            <i class="fa fa-bookmark"></i>{{trans('my-group.date')}}
                                                        </th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($articles as $article)
                                                        <tr>
                                                            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                                                <a href="#"> {{$article->title}} </a>
                                                            </td>
                                                            <td class="hidden-xs">{{$article->category->name}}</td>
                                                            <td class="hidden-xs">{{$article->created_at->format('m/d/Y')}}</td>
                                                            <td>
                                                                <a class="btn btn-sm grey-salsa btn-outline"
                                                                   href="#"> {{trans('my-group.show')}}</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!--tab-pane-->

                                    </div>
                                </div>
                        </div>
                        @else
                            <br><br>
                            <div class="alert alert-warning">{{trans('my-group.you are not added any article')}}</div>
                        @endif
                    </div>

                    <!--end tab-pane-->
                </div>
            </div>
        </div>
    </div>
@endsection