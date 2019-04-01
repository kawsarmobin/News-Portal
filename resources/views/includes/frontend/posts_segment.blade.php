@foreach ($posts as $post)
<section class="card pb-4 mb-3">
    <!--Main content-->
    <div class=" pr-3 pl-3 mr-3 ml-3 mt-3">
        <div class="row">
            <div class="col-9">
                <div>
                    <h2 class="post-title"><b><a style="text-decoration: none; "  href="{{ route('post.single.page', $post->token) }}">{{ $post->title }}</a></b></h2>
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
                        <p style="margin-top: -10px;"><b>Source:</b> <a href="{{ $post->source_link }}" target="_blank">{{ str_limit($post->source_link, 30) }}</a></p>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-3">
                <!--Vote option-->
                <div style="padding: 0 0 0 18px; margin-top: 80%;">
                    <app-vote :post="{{ $post }}"></app-vote>
                </div>
            </div>
        </div>
    </div>
    <p class="bg-secondary text-white pl-2">Kindly Summarized by</p>
    <div class="row post-part" style="margin-top: -25px;">
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
                    <a href="{{ $post->user->website }}" target="_blank">{{ $post->user->website }}</a>                    
                    @else
                    <span>{{ $post->user->name }}</span> 
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
</section>
@endforeach