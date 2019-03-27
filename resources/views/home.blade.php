@extends('layouts.custom') 
@section('content')
<div class="row clearfix">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">playlist_add_check</i>
                </div>
                <div class="content">
                    <div class="text">TOPICS</div>
                    <div class="number count-to" data-from="0" data-to="{{ $num_of_topics }}" data-speed="15" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">forum</i>
                </div>
                <div class="content">
                    <div class="text">POSTS</div>
                    <div class="number count-to" data-from="0" data-to="{{ $num_of_posts }}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">person_add</i>
                </div>
                <div class="content">
                    <div class="text">USERS</div>
                    <div class="number count-to" data-from="0" data-to="{{ $num_of_users }}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
    </div>
@endsection