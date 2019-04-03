@extends('layouts.custom')
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 class="text-uppercase">
                    Post
                </h2>
            </div>
            <div class="body">
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
                        <td>{{ str_limit($post->source_link, 30) }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td style="width: 95px; padding-top: 12px;">Post Link</td>
                        <td style="width: 1px; padding-top: 12px;">:</td>
                        <td><input class="form-control" type="text" value="{{ route('own-posts.show', $post->token) }}"
                                readonly></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
