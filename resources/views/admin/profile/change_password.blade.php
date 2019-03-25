<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                Change Password
            </h2>
        </div>
        <div class="body">
            <form action="{{ route('admin.profile.update-password') }}" method="post">
                @csrf
                <label for="password">New Password</label>
                <div class="form-group">
                    <div class="form-line">
                        <input id="password" type="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                            name="password" placeholder="Enter a new password" required>
                    </div>
                    @if ($errors->has('password'))
                    <span class="" role="alert">
                        <strong class="input-error">{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <label for="password">Confirm Password</label>
                <div class="form-group">
                    <div class="form-line">
                        <input id="password-confirm" type="password" class="form-control"
                        name="password_confirmation" placeholder="Enter password again" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
            </form>
        </div>
    </div>
</div>