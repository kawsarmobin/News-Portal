@extends('layouts.frontend')
@section('content')
<div class="col-lg-10 p-5">
    <div class="my-4">
        <div class="card" id="profiles">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-10 p-5">
                        <h3>Change Password</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('profile.update-password') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="password">{{ __('New Password') }}</label>

                                        <input id="password" type="password"
                                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit"
                                            class="btn btn-outline-secondary btn-sm button">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
