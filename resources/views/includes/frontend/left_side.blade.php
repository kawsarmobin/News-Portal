<div class="col-lg-3 col-sm-12 mt-4 navbar-expand-lg navbar-light">
    <div class="custom-topic-header">
        <div class="d-flex">
            <div class="">
                <p>
                    @if (auth()->check())
                    My
                    @endif
                    Topics
                </p>
            </div>
            <div class="ml-auto p-2">
                <button class="navbar-toggler topic-toggle-button" type="button" data-toggle="collapse" data-target="#topicNav"
                    aria-controls="topicNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </div>
    <div class="topics-card">

        <div class="topic-item">
            @if ($num_of_topics = $topics->count())
                <div class="collapse navbar-collapse" id="topicNav">
                    <ul class="topic-nav-ul">
                        @foreach ($topics as $topic)
                            <li class="list-unstyled">
                                <a href="{{ route('topic.posts', ['slug' => $topic->slug]) }}">
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i> {{ $topic->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
            <div>
                <h5>No topics yet...</h5>
            </div>
            @endif
        </div>
    </div>
</div>
