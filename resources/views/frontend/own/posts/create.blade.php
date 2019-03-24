@extends('layouts.frontend') 
@section('content')
<div class="col-lg-1"></div>
<div class="col-lg-10 p-5">
    <div class="my-4">
        <section id="topics" style="background-color: #FFFFFF">
            <div class="row justify-content-center">
                <div class="col-lg-10 p-5">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3><b>Add New Post</b></h3>
                        </div>
                        <div class="col-lg-6">
                            <a class="btn btn-primary btn-sm float-right" style="margin-top: 8px" href="{{ route('own-posts.index') }}">Back</a>
                        </div>
                    </div>
                    <hr>
                    <form action="{{ route('own-posts.store') }}" method="post">
                        @csrf
                        @include('frontend.own.posts.fields',[
                            'actionTitle' => 'Submit'
                        ])
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="col-lg-1"></div>
@endsection