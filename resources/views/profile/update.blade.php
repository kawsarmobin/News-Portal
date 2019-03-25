@extends('layouts.frontend')
@section('content')
<div class="col-lg-10 p-5">
    <div class="my-4">
        <div class="card" id="profiles">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-10 p-5">
                        <h3>My Information update</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name *</label>
                                        <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                                type="text" 
                                                name="name" 
                                                value="{{ old('name',  $profile->name) }}"
                                                placeholder="Enter Name">
        
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                                type="email" 
                                                name="email" 
                                                value="{{ old('email',  $profile->email) }}"
                                                placeholder="Enter email">
        
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input class="form-control {{ $errors->has('website') ? ' is-invalid' : '' }}" 
                                                type="url" 
                                                name="website" 
                                                value="{{ old('website',  $profile->website) }}"
                                                placeholder="Enter website">
        
                                        @if ($errors->has('website'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('website') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                            <label for="sub_title">Sub Title</label>
                                            <input class="form-control {{ $errors->has('sub_title') ? ' is-invalid' : '' }}" 
                                                    type="text" 
                                                    name="sub_title" 
                                                    value="{{ old('sub_title',  $profile->sub_title) }}"
                                                    placeholder="Enter Sub Title">
            
                                            @if ($errors->has('sub_title'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('sub_title') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    <div class="form-group">
                                        <label for="avatar">Avatar</label><br>
                                        <input class="{{ $errors->has('avatar') ? ' is-invalid' : '' }}" type="file" name="avatar">
        
                                        @if ($errors->has('avatar'))
                                            {{-- <span class="invalid-feedback" role="alert"> --}}
                                                <br>
                                                <strong style="font-size: 80%" class="text-danger">{{ $errors->first('avatar') }}</strong>
                                            {{-- </span> --}}
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-secondary btn-sm button">Update</button>
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
