<div class="col-md-3 col-sm-12 my-4" >
    <div class="custom-topic-header">
        <p>
                @if (auth()->check())
                My 
            @endif
            Topics
        </p>
    </div>
    <div class="topics-card">
        
        <div class="topic-item">
            @if ($num_of_topics = $topics->count()) @foreach ($topics as $topic)
            <li class="list-unstyled"><a href="{{ route('topic.posts', ['slug' => $topic->slug]) }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>  {{ $topic->name }}</a></li>
            @if (--$num_of_topics)
             @endif @endforeach @else
            <div>
                <h5>No topics yet...</h5>
            </div>
            @endif
        </div>
    </div>
</div>