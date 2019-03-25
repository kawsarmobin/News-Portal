@extends('layouts.frontend') 
@section('content')
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
                            <a class="btn btn-outline-primary btn-sm float-right" style="margin-top: 8px" href="{{ route('own-posts.index') }}">Back</a>
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
                            <td>Summery</td>
                            <td>:</td>
                            <td>{!! $post->summery !!}</td>
                        </tr>
                    </table>
                    <hr>
                    <table class="table text-justify no-border cus-padding">
                        @if ($post->source_link)
                        <tr>
                            <td>Source Link</td>
                            <td>:</td>
                            <td>{{ str_limit($post->source_link, 30) }}</td>
                        </tr>
                        @endif
                        <tr>
                            <td style="width: 95px; padding-top: 12px;">Post Link</td>
                            <td style="width: 1px; padding-top: 12px;">:</td>
                            <td><input class="form-control" type="text" value="{{ route('own-posts.show', $post->token) }}" readonly></td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection