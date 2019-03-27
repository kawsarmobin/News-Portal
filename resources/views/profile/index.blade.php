@extends('layouts.frontend')
@section('content')
<div class="col-lg-10 p-5">
    <div class="my-4">
        <div class="card" id="topics">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-12 p-5">
                        <h3>My Information</h3><hr>
                        <div class="row">
                            <div class="col-md-4 profile-view">
                                @if ($profile->avatar)
                                    <img class="img-thumbnail" src="{{ $profile->user_avatar }}" width="80%" alt="">
                                @else
                                    <img src="{{ asset('img/avatar.gif') }}" width="80%" alt="">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <table class="table no-border cus-padding">
                                    <tr>
                                        <td width="70px"><b>Name</b></td>
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
                                    <tr>
                                    <td><b>Sub Title</b></td>
                                        <td><b> : </b></td>
                                        <td>{{ $profile->sub_title }}</td>
                                    </tr>
                                </table>
                                <a href="{{ route('profile.change-password') }}" class="btn btn-sm btn-outline-info">Change Password</a>
                                <a href="{{ route('profile.update') }}" class="btn btn-sm btn-outline-primary">Update Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection