@extends('layouts.frontend') 
@section('content')
<div class="col-lg-10 p-5">
    <div class="my-4">
        <section id="topics" style="background-color: #FFFFFF">
            <div class="row justify-content-center">
                <div class="col-lg-10 p-5">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3><b>Topics</b></h3>
                        </div>
                        <div class="col-lg-6">
                            <a class="btn btn-primary btn-sm float-right" style="margin-top: 8px" href="{{ route('topics.create') }}">Add New Topic</a>
                        </div>
                    </div>
                    <hr>
                    @if ($topics->count())
                    <div style="border: 1px solid rgba(0, 0, 0, 0.1)">
                        <table class="table table-striped" style="margin-bottom: 0rem;">
                            <tbody>
                                @foreach ($topics as $key => $topic)
                                <tr>
                                    <td><span class="pl-3" style="color: #007ACC !important"><b>{{ $topic->name }}</b></span></td>
                                    <td>
                                        @can('update-topic', $topic)
                                            <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-edit"></i> </a> &nbsp;
                                        @endcan
                                        @can('delete-topic', $topic)
                                            @include('includes._confirm_delete',[
                                                'id' => $topic->id,
                                                'action' => route('topics.destroy', $topic->id) 
                                            ])
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else 
                    <div class="card-body text-center">
                        <h2>No posts yet...</h2>
                    </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
</div>
@endsection