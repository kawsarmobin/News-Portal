@extends('layouts.frontend') 
@section('content')
<div class="col-lg-1"></div>
<div class="col-lg-10 p-5">
    <div class="my-4">
        <section id="topics" style="background-color: #FFFFFF">
            <div class="row justify-content-center">
                <div class="col-lg-10 p-5">
                    <h3><b>Edit Post</b></h3>
                    <hr>
                    <form action="{{ route('own-posts.update', $post->id) }}" method="post">
                        @csrf @method('PATCH')
                        @include('frontend.own.posts.fields',[
                            'actionTitle' => 'Update'
                        ])
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="col-lg-1"></div>
@endsection