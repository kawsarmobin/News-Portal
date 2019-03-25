<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="card" style="overflow: hidden">
        <div class="header">
            <h2>
                Change Password
            </h2>
        </div>
        <div class="body">
            <form action="{{ route('admin.profile.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6" style="margin-bottom: 0 !important">
                    <label for="name">Name</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text"
                                    name="name" value="{{ old('name',  $profile->name) }}" placeholder="Enter Name">
                        </div>
                        @if ($errors->has('password'))
                        <span class="" role="alert">
                            <strong class="input-error">{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <label for="website">Website</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input class="form-control {{ $errors->has('website') ? ' is-invalid' : '' }}"
                                    type="url" name="website" value="{{ old('website',  $profile->website) }}"
                                    placeholder="Enter website">
                        </div>
                        @if ($errors->has('password'))
                        <span class="" role="alert">
                            <strong class="input-error">{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6" style="margin-bottom: 0 !important">
                    <label for="email">Email</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    type="email" name="email" value="{{ old('email',  $profile->email) }}"
                                    placeholder="Enter email">
                        </div>
                        @if ($errors->has('password'))
                        <span class="" role="alert">
                            <strong class="input-error">{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <label for="avatar">Avatar</label><br>
                    <div class="form-group">
                        <input class="{{ $errors->has('avatar') ? ' is-invalid' : '' }}" type="file"
                                    name="avatar">
                        @if ($errors->has('password'))
                        <span class="" role="alert">
                            <strong class="input-error">{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
