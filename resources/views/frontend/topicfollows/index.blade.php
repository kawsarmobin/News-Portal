@extends('layouts.frontend') 
@section('content')
<div class="col-lg-10 p-5">
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
                                    <td style=" padding: 5px"><span class="pl-3" style="color: #007ACC !important"><b>{{ $topic['name'] }}</b></span></td>

                                    @if (auth()->check())
                                    <td style=" padding: 5px">
                                        <a style="text-decoration: none" href="{{ route('topic.follows.follow', $topic['id']) }}" class="{{ $topic->isFollowed()?'text-secondary':'text-primary' }}">{{ $topic->isFollowed()?'Unfollow':'Follow' }}</a> 
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else 
                        <div class="card-body text-center">
                            <h2>No topics yet...</h2>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
</div>
@endsection