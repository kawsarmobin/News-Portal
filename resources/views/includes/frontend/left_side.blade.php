<div class="card">
        <h5 class="card-header">Topics</h5>
        <div class="card-body">
            <ul style="list-style-image: url({{ asset('img/star.png') }});">
                @if ($num_of_topics = $topics->count())
                    @foreach ($topics as $topic)
                        <li><a href="{{ route('topic.posts', ['slug' => $topic->slug]) }}">{{ $topic->name }}</a></li>
                        @if (--$num_of_topics)
                            <hr style="margin-left: -41px">
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>