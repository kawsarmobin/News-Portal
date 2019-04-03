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
                        @if (config('topics.topic_post_check'))
                        <tr>
                            <td>Topic</td>
                            <td>:</td>
                            <td>{{ $post->topic?$post->topic->name.' ':'' }}</td>
                        </tr>
                        @endif
                        <tr>
                            <td style="width: 95px">Title</td>
                            <td style="width: 1px">:</td>
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
                            <td><a style="border: 1px solid gray; border-radius: 3px; padding: 3px;" href="{{ $post->source_link }}" target="_blank">{{ str_limit($post->source_link, 70) }}</a></td>
                        </tr>
                        @endif
                        <tr>
                            <td style="width: 95px; padding-top: 12px;">Post Link</td>
                            <td style="width: 1px; padding-top: 12px;">:</td>
                            <td>
                                <input class="form-control" id="copy{{ $post->id }}" type="text" value="{{ route('post.single.page', $post->token) }}" readonly>
                                <!-- The button used to copy the text -->
                                <button class="btn btn-sm btn-outline-secondary mt-1" onclick="CopyToClipboard('copy{{ $post->id }}')" style="margin-bottom: 15px;">Copy</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection