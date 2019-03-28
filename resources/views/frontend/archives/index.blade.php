@extends('layouts.frontend') 
@section('content')
<!--Left-->
    @include('includes.frontend.left_side')
<!--Center-->
<div class="col-md-7 col-sm-12 main-tab" style="font-family: lato">
    <div class="my-4">
        <div class="main-heading">
            <div class="p-2 text-center"><h4>Posts Archive</h4></div>
        </div>
        @if ($posts->count()) @foreach ($posts as $post)
        <section class="card pb-4 mb-3">
            <div class="row post-part">
                <!--Avatar-->
                <div class="row m-0 p-0 avater" style="width: 100%;">
                    <div class="col-2 ">
                        @if ($post->user->avatar)
                        <img class="m-4" style="border-radius: 50%; width:50px; height:50px; object-fit: cover; display: block;" src="{{ $post->user->avatar_thumbnail }}" alt="AVATAR"> 
                        @else
                        <img class="m-4" style="border-radius: 50%; width:50px; height:50px; object-fit: cover; display: block;" src="{{ asset('img/avatar.gif') }}" alt="Image Not Found"> 
                        @endif
                    </div>
                    <div class="col-10">
                        <div class="mt-4 avater-name">
                            <!--Website name / User name-->
                            @if ($post->user->website)
                            <a style="text-decoration: none;" href="{{ $post->user->website }}" target="_blank">{{ $post->user->website }}</a>                    
                            @else
                            <span style="text-decoration: none;">{{ $post->user->name }}</span> 
                            @endif
                            <p>
                                <!--Sybtitle-->
                                @if ($post->user->sub_title)
                                <span style="color: gray">{{ $post->user->sub_title }}</span> 
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!--Main content-->
            <div class="card p-3 m-3">
                <div>
                    <h2><b><a style="text-decoration: none;" href="{{ route('post.single.page', $post->token) }}">{{ $post->title }}</a></b></h2>
                </div>
                <div>
                    <p style="font-size: 15px; margin: 0"><b>{{ $post->topic->name }}</b> &nbsp; <span style="color: gray">{{ $post->created_at->diffForHumans() }}</span></p>
                </div>
                <div style="padding-left: 20px">
                    <div>
                        <p><b>{!! $post->summery !!}</b></p>
                    </div>
                    @if ($post->source_link)
                    <div>
                        <p style="margin-top: -10px;">Source: <a style="text-decoration: none;" href="{{ $post->source_link }}" target="_blank">{{ str_limit($post->source_link, 30) }}</a></p>
                    </div>
                    @endif
                </div>
            </div>
            <!--Vote option-->
            <div style="padding: 0 0 0 18px">
                <a class="btn btn-sm btn-danger" href="">Vote <span class="badge badge-light">4</span></a>
            </div>
        </section>
        @endforeach
        <!--Pagination-->
        <div class="row justify-content-center">
            <div class="col-md-6">
                {{ $posts->links() }}
            </div>
        </div>
        <!--If post not found-->
        @else
        <div class="card-body text-center">
            <h2>No posts yet...</h2>
        </div>
        @endif
    </div>
</div>
<!--Right-->
    @include('includes.frontend.right_side')
@endsection