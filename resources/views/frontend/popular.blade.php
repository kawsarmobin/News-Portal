@extends('layouts.frontend') 
@section('content')
<!--Left-->
    @include('includes.frontend.left_side')
<!--Center-->
<div class="col-lg-7 col-sm-12 main-tab" style="font-family: lato;">
    <div class="my-4">
        <!--Recent post-->
        @include('includes.top_panel', ['title'=>'Popular'])
        
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