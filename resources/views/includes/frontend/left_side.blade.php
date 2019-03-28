<div class="col-3" style="margin-top: 59px; position: static">
    <div class="card">
        <h5 class="card-header">Topics</h5>
        <div class="card-body">
            @if ($num_of_topics = $topics->count()) @foreach ($topics as $topic)
            <li style="list-style-image: url({{ asset('img/star.png') }});"><a href="{{ route('topic.posts', ['slug' => $topic->slug]) }}">{{ $topic->name }}</a></li>
            @if (--$num_of_topics)
            <hr> @endif @endforeach @else
            <div>
                <h5>No topics yet...</h5>
            </div>
            @endif
        </div>
    </div>
</div>