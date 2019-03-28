@extends('layouts.custom') 
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 class="text-uppercase">
                    All Users
                </h2>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                {{ $user->user_role }} | 
                                <a class="badge bg-primary" href="{{ route('admin.users.role', $user->id) }}">{{ $user->is_admin?'Regular User':'Admin' }}</a>
                            </td>
                            <td>
                                {{ $user->status }} | 
                                <a class="badge bg-primary" href="{{ route('admin.users.status', $user->id) }}">{{ $user->is_active?'Deactive':'Active' }}</a>
                            </td>
                            <td>
                                @include('includes._admin_confirm_delete',[
                                    'action' => route('admin.users.destroy', $user->id),
                                    'id' => $user->id
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