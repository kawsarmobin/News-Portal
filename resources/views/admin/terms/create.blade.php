@extends('layouts.custom') 
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>TERMS</h2>
            </div>
            @include('includes.errors')

            <div class="body">
                <form action="{!! route('terms.store') !!}" method="post">
                    @csrf
                    <textarea id="ckeditor" name="description">{!! $term->description !!}</textarea> <br>
                   
                    <button type="submit" class="btn bg-blue-grey waves-effect pull-right">Submit</button> <br>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection