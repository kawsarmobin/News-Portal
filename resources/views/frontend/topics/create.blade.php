@extends('layouts.frontend') 
@section('content')
<div class="col-lg-10 p-5">
    <div class="my-4">
        <section id="topics" style="background-color: #FFFFFF">
            <div class="row justify-content-center">
                <div class="col-lg-10 p-5">
                    <h3><b>Create Topic</b></h3>
                    <hr>
                    <form action="{{ route('topics.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Topic Name: </label>
                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="type" name="name" value="{{ old('name') }}" placeholder="Add a topic name">
                            
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                                
                            <span class="span"><b>Note: </b>You will be the admin for this topic</span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-secondary btn-sm button">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection