@extends('layouts.frontend') 
@section('content')
<div class="col-lg-8 p-5">
    <div class="my-4">
        <section id="topics" style="background-color: #FFFFFF">
            <div class="row justify-content-center">
                <div class="col-lg-8 p-5">
                    <h3><b>Edit Topic</b></h3>
                    <hr>
                    <form action="{{ route('topics.update', $topic->id) }}" method="post">
                        @csrf @method('PATCH')
                        <div class="form-group">
                            <label class="control-label">Topic Name: </label>
                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="type" name="name" value="{{ $topic->name }}" placeholder="Add a topic name">
                            
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                                
                            <span class="span"><b>Note: </b>You will be the admin for this topic</span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-secondary btn-sm button">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="col-lg-2"></div>
@endsection