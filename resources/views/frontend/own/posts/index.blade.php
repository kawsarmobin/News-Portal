@extends('layouts.frontend') 
@section('content')
<div class="col-lg-10 p-5">
    <div class="my-4">
        <section id="topics" style="background-color: #FFFFFF">
            <div class="row justify-content-center">
                <div class="col-lg-10 p-5">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3><b>Posts</b></h3>
                        </div>
                        <div class="col-lg-6">
                            <a class="btn btn-primary btn-sm float-right" style="margin-top: 8px" href="{{ route('own-posts.create') }}">Add New Post</a>
                        </div>
                    </div>
                    <hr>
                    @if ($posts->count())
                    <div style="border: 1px solid rgba(0, 0, 0, 0.1)">
                        <table class="table table-striped" style="margin-bottom: 0rem;">
                            <tbody>
                                @foreach ($posts as $key => $post)
                                <tr>
                                    <td><span style="color: #007ACC !important"><b>{{ $post->title }}</b></span></td>
                                    <td width="23%">
                                        <a href="{{ route('own-posts.show', $post->id) }}" class="btn btn-sm btn-outline-info"><i class="fa fa-eye"></i> </a> &nbsp;
                                        <a href="{{ route('own-posts.edit', $post->id) }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-edit"></i> </a> &nbsp;
                                        @include('includes._confirm_delete',[
                                            'id' => $post->id,
                                            'action' => route('own-posts.destroy', $post->id) 
                                        ])
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else 
                    <h4>No posts yet...</h4>
                    @endif
                </div>
            </div>
        </section>
    </div>
</div>
@endsection