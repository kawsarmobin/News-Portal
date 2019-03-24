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
                            <h3><b>View Post</b></h3>
                        </div>
                        <div class="col-lg-6">
                            <a class="btn btn-primary btn-sm float-right" style="margin-top: 8px" href="{{ route('own-posts.index') }}">Back</a>
                        </div>
                    </div>
                    <hr>
                    <table class="table text-justify no-border cus-padding">
                        <tr>
                            <td style="width: 95px">Topic</td>
                            <td style="width: 1px">:</td>
                            <td>{{ $post->topic->name }}</td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td>:</td>
                            <td>{{ $post->title }}</td>
                        </tr>
                        <tr>
                            <td>External Link</td>
                            <td>:</td>
                            <td>{{ $post->topic->name }}</td>
                        </tr>
                        @if ($post->source_link)
                        <tr>
                            <td>Source Link</td>
                            <td>:</td>
                            <td>{{ $post->source_link }}</td>
                        </tr>
                        @endif
                        <tr>
                            <td>Summery</td>
                            <td>:</td>
                            <td>{!! $post->summery !!}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="col-lg-1"></div>
@endsection