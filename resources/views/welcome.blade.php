@extends('layouts.frontend') 
@section('content')
<!--Left-->
    @include('includes.frontend.left_side')
<!--Center-->
<div class="col-7 pl-0" style="font-family: lato">
    <div class="my-4">
        <!--Recent post-->
        <div class="row" style="margin: 0 15px -14px 15px; padding-bottom: -5px;">
            <div class="col-sm-6">
                <h4 class="padding: 0; margin:0; vertical-align: middle"><b>Today</b></h4>
            </div>
            <div class="col-sm-6">
                <a class="float-right" style=" margin-left: 10px; text-decoration: none; color: gray;" href="{{ route('own-posts.create') }}">New</a>
                <a class="float-right" style=" text-decoration: none; color: gray" href="{{ route('own-posts.create') }}">Popular</a>
            </div>
        </div>

        @if ($posts->count())
        <!--Include posts segment-->
    @include('includes.frontend.posts_segment')

        <!--Pagination-->
        <div class="row justify-content-center">
            <div class="col-md-6">
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