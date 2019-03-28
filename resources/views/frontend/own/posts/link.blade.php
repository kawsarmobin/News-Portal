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
                        <input class="form-control" id="copy{{ $post->id }}" type="text" value="{{ route('post.single.page', $post->token) }}" readonly>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- The button used to copy the text -->
                            <button class="btn btn-sm btn-outline-secondary" onclick="CopyToClipboard('copy{{ $post->id }}')" style="margin-bottom: 15px;">Copy</button>
                        </div>
                        <div class="col-lg-6">
                            <a class="btn btn-outline-primary btn-sm float-right" href="{{ route('own-posts.show', $post->id) }}">View Your New Post</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection