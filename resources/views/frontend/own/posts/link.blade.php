@extends('layouts.frontend') 
@section('content')
<div class="col-lg-10 p-5">
    <div class="my-4">
        <section id="topics" style="background-color: #FFFFFF">
            <div class="row justify-content-center">
                <div class="col-lg-10 p-5">
                    <div class="text-center text-primary">
                        <h2>{{ $post->title }}</h2>
                        <hr>
                    </div>
                    <div class="form-group text-center">
                        <input class="form-control" type="text" value="{{ route('own-posts.show', $post->token) }}" readonly>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <p class="btn btn-outline-secondary">Copy Post link</p>
                        </div>
                        <div class="col-lg-6">
                            <a class="btn btn-outline-primary float-right"href="{{ route('own-posts.show', $post->id) }}">View Your New Post</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection