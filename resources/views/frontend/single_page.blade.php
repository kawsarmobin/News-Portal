@extends('layouts.frontend') 
@section('content')
<!--Left-->
    @include('includes.frontend.left_side')
<!--Center-->
<div class="col-lg-7 pl-0" style="padding-top: 35px">
    <div class="my-4">
        <section class="card p-3 m-3">
            <div class="row">
                <!--Avatar-->
                <div class="col-sm-1" style="padding: 0 0 0 30px">
                    @if ($post->user->avatar)
                    <img style="width: 60px; border-radius: 35px; margin-top: 15px;" src="{{ $post->user->avatar_thumbnail }}" alt="AVATAR">                    
                    @else
                    <img style="width: 60px; border-radius: 35px; margin-top: 15px;" src="{{ asset('img/avatar.gif') }}" alt="">                    
                    @endif
                </div>
                <!--Website url-->
                <div class="col-sm-10" style="padding: 16px 0 0 25px;">
                    <div class="col-sm-10">
                        @if ($post->user->website)
                        <a style="text-decoration: none; font-size: 18px;" href="{{ $post->user->website }}" target="_blank">{{ $post->user->website }}</a>                        
                        @else
                        <span style="text-decoration: none; font-size: 18px;">{{ $post->user->name }}</span> @endif
                    </div>
                    <!--Website subtitle-->
                    <div class="col-sm-10">
                        @if ($post->user->sub_title)
                        <span style="color: gray">{{ $post->user->sub_title }}</span> @endif
                    </div>
                </div>
            </div>
            <!--Main content-->
            <div class="card p-3 m-3">
                <div>
                    <h2><b>{{ $post->title }}</b></h2>
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
    </div>
</div>
<!--Right-->
    @include('includes.frontend.right_side')
@endsection