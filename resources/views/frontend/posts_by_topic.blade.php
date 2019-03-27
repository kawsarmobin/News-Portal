@extends('layouts.frontend') 
@section('content')
<!--Left-->
<div class="col-3 my-4">
    @include('includes.frontend.left_side')
</div>
<!--Center-->
<div class="col-7" style="font-family: lato">
    <div class="my-4">
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
<div class="col-sm-2 my-4">
    @include('includes.frontend.right_side')
</div>
@endsection