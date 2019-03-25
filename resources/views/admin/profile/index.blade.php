@extends('layouts.custom')
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Profile</h2>
            </div>
            <div class="body">
                <div class="row">
                    <div>
                        <div class="col-md-6 admin-profile-view">
                            @if ($profile->avatar)
                            <img src="{{ $profile->user_avatar }}" width="50%" alt="">
                            @else
                            <img src="{{ asset('img/avatar.gif') }}" width="50%" alt="">
                            @endif
                        </div>
                        <div class="col-md-6">
                            <table class="table no-border cus-padding">
                                <tr>
                                    <td width="5px"><b>Name</b></td>
                                    <td width="1px"><b> : </b></td>
                                    <td>{{ $profile->name }}</td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td><b> : </b></td>
                                    <td>{{ $profile->email }}</td>
                                </tr>
                                <tr>
                                    <td><b>Website</b></td>
                                    <td><b> : </b></td>
                                    <td>{{ $profile->website }}</td>
                                </tr>
                            </table>
                            <a href="{{ route('admin.profile.update') }}" class="btn btn-sm btn-primary">Update
                                Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
