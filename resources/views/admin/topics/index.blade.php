@extends('layouts.custom') 
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 class="text-uppercase">
                    All Topic
                </h2>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Published Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topics as $key => $topic)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $topic->name }}</td>
                            <td>{{ $topic->user->name }}</td>
                            <td>{{ date('F d, Y', strtotime($topic->created_at)) }}</td>
                            <td>
                                @include('includes._admin_confirm_delete',[
                                    'action' => route('admin.topics.destroy', $topic->id),
                                    'id' => $topic->id
                                ])
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection