@extends('layouts.frontend') 
@section('content')
<div class="col-lg-8 p-5">
    <div class="my-4">
        <section id="topics" style="background-color: #FFFFFF">
            <div class="row justify-content-center">
                <div class="col-lg-10 p-5">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3><b>Topics</b></h3>
                        </div>
                    </div>
                    <hr>
                    @if (count($topics))
                    <div style="border: 1px solid rgba(0, 0, 0, 0.1)">
                        <table class="table table-striped" style="margin-bottom: 0rem;">
                            <tbody>
                                @foreach ($topics as $topic)
                                <tr>
                                    <td><span class="pl-3" style="color: #007ACC !important"><b>{{ $topic['name'] }}</b></span></td>

                                    @if (auth()->check())
                                    <td>
                                        <a href="{{ route('topic.follows.follow', $topic['id']) }}" class="btn btn-sm btn-outline-secondary">{{ $topic->followTitle() }}</a> 
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else 
                    <h4>Topics not yet...</h4>
                    @endif
                </div>
            </div>
        </section>
    </div>
</div>
<div class="col-lg-2"></div>
@endsection