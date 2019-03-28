@extends('layouts.custom')
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 class="text-uppercase">
                    All Posts
                </h2>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr>
                            <th width="10%">#</th>
                            <th width="20%">Title</th>
                            <th width="20%">Topic</th>
                            <th width="20%">User Name</th>
                            <th width="15%">Post Date</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($posts->count())
                            @foreach ($posts as $key => $post)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->topic->name }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->created_at->toDateString() }}</td>
                                    <td>
                                        <a href="{{ route('admin.posts.show', $post->id) }}"><i class="material-icons">remove_red_eye</i></a>
                                        @include('includes._admin_confirm_delete',[
                                            'action' => route('admin.posts.destroy', $post->id),
                                            'id' => $post->id
                                        ])
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
