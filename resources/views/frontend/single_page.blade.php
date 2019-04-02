@extends('layouts.frontend') 

@section('meta')
<meta name="title" content="{{ $post->title }}">
<meta name="description" content="{!! $post->summery !!}">
@endsection

@section('content')
<!--Left-->
    @include('includes.frontend.left_side')
<!--Center-->
<div class="col-lg-7 col-sm-12 main-tab" style="font-family: lato;">
    <div class="my-4">
        <!--Top panel-->
        @include('includes.top_panel', ['title'=>'Today'])
        <section class="card pb-4 mb-3">
            <!--Main content-->
            <div class=" pr-3 pl-3 mr-3 ml-3 mt-3">
                <div class="row">
                    <div class="col-9 cus-font">
                        <div>
                            <h2 class="post-title cus-font"><b>{{ $post->title }}</b></h2>
                        </div>
                        <div>
                            <p class="cus-font" style="font-size: 15px; margin: 0"><b>{{ $post->topic->name }}</b> &nbsp; <span style="color: gray">{{ $post->created_at->diffForHumans() }}</span></p>
                        </div>
                        <div class="post-text">
                            <div>
                                <p class="text-justify cus-font">{!! $post->summery !!}</p>
                            </div>
                            @if ($post->source_link)
                            <div>
                                <p class="cus-font" style="margin-top: -10px;"><b>Source:</b> <a href="{{ $post->source_link }}" target="_blank">{{ str_limit($post->source_link, 30) }}</a></p>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-3">
                        <!--Vote option-->
                        <div style="padding: 0 0 0 18px; margin-top: 80%;">
                            <app-vote :post="{{ $post }}"></app-vote>
                        </div>
                    </div>
                </div>
            </div>
            <p class="bg-secondary text-white pl-2 cus-font">Kindly Summarized by</p>
            <div class="row post-part" style="margin-top: -25px;">
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
                        <div class="mt-4 avater-name cus-font">
                            <!--Website name / User name-->
                            @if ($post->user->website)
                            <a href="{{ $post->user->website }}" target="_blank">{{ $post->user->website }}</a>                    
                            @else
                            <span>{{ $post->user->name }}</span> 
                            @endif
                            <p>
                                <!--Sybtitle-->
                                @if ($post->user->sub_title)
                                <span class="cus-font" style="color: gray">{{ $post->user->sub_title }}</span> 
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <hr class="bg-secondary">

        @if ($posts->count())
        <!--Include posts segment-->
        @include('includes.frontend.posts_segment')

        <!--Pagination-->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                {{ $posts->links() }}
            </div>
        </div>
        <!--If post not found-->
        @else
        <div class="card bg-light text-dark text-center" style="margin-top: 18px;">
            <div class="card-body">
                <h2>No posts yet...</h2>
            </div>
        </div>
        @endif
    </div>
</div>
<!--Right-->
    @include('includes.frontend.right_side')
@endsection