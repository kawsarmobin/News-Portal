@extends('layouts.frontend') 
@section('content')
<!--Left-->
    @include('includes.frontend.left_side')
<!--Center-->
<div class="col-lg-7 col-sm-12 main-tab mt-3" style="font-family: lato">
    <div class="my-4">
        <div class="main-heading">
            <div class="p-2 text-center">
                <h4 class="text-capitalize">{{ $title }}</h4>
            </div>
        </div>
        @if ($data)
        <section class="card mb-3">
            <div class="card-body text-justify">
                <p>{!! $data->description !!}</p>
            </div>
        </section>
        @else
        <section class="card mb-3">
            <div class="card-body">
                <h4 class="text-center">No <span class="text-lowercase">{{ $title }}</span></h4>
            </div>
        </section>
        @endif
    </div>
</div>
<!--Right-->
    @include('includes.frontend.right_side')
@endsection