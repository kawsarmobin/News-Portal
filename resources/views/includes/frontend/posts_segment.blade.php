@foreach ($posts as $post)
<section class="card pb-4 mb-3">
    <div class="row post-part">
        <!--Avatar-->
        <div class="row m-0 p-0 avater" style="width: 100%;">
            <div class="col-2 ">
                @if ($post->user->avatar)
                <img class="m-4" style="border-radius: 50%; width:50px; height:50px; object-fit: cover; display: block;" src="{{ $post->user->avatar_thumbnail }}" alt="AVATAR"> 
                @else
                <img class="m-4" style="border-radius: 50%; width:50px; height:50px; object-fit: cover; display: block;" src="{{ asset('img/avatar.gif') }}" alt="Image Not Found"> 
                @endif
            </div>
            <div class="col-10">
                <div class="mt-4 avater-name">
                    <!--Website name / User name-->
                    @if ($post->user->website)
                    <a style="text-decoration: none;" href="{{ $post->user->website }}" target="_blank">{{ $post->user->website }}</a>                    
                    @else
                    <span style="text-decoration: none;">{{ $post->user->name }}</span> 
                    @endif
                    <p>
                        <!--Sybtitle-->
                        @if ($post->user->sub_title)
                        <span style="color: gray">{{ $post->user->sub_title }}</span> 
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--Main content-->
    <hr class="mt-0">
    <div class=" pr-3 pl-3 mr-3 ml-3">
        <div>
            <h2><b><a class="text-dark" style="text-decoration: none;" href="{{ route('post.single.page', $post->token) }}">{{ $post->title }}</a></b></h2>
        </div>
        <div>
            <p style="font-size: 15px; margin: 0"><b>{{ $post->topic->name }}</b> &nbsp; <span style="color: gray">{{ $post->created_at->diffForHumans() }}</span></p>
        </div>
        <div class="post-text">
            <div>
                <p class="text-justify">{!! $post->summery !!}</p>
            </div>
            @if ($post->source_link)
            <div>
                <p style="margin-top: -10px;"><b>Source:</b> <a style="text-decoration: none;" href="{{ $post->source_link }}" target="_blank">{{ str_limit($post->source_link, 30) }}</a></p>
            </div>
            @endif
        </div>
    </div>
    <hr>
    <!--Vote option-->
    <div style="padding: 0 0 0 18px">
        <a class="btn btn-sm btn-danger" href="">Vote <span class="badge badge-light">4</span></a>
    </div>
</section>
@endforeach