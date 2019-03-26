@extends('layouts.frontend') 
@section('content')
<div class="col-lg-10 p-5">
    <div class="my-4">
        <section id="topics" style="background-color: #FFFFFF">
            <div class="row justify-content-center">
                <div class="col-lg-10 p-5">
                    <div class="text-center text-primary">
                        <h2>Posts Link</h2>
                        <hr>
                    </div>
                    <div class="row" style="margin-right: 15px">
                        <ol style="width: 100%">
                            @foreach ($post_link_lists as $pll)
                            <div style="border: 1px solid gray; border-radius: 5px; padding: 10px 20px 0px 20px" class="m-2">
                                <li>
                                    <h5 class="float-left">{{ $pll->title }}</h5>
                                    <a class="float-right btn btn-sm btn-outline-primary" href=""style="margin-bottom: 15px;" >Copy</a>
                                </li>
                                <input class="form-control" type="text" value="{{ route('post.single.page', $pll->token) }}" readonly><br>
                            </div>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection