<div class="col-sm-2 pl-0" style="margin-top: 59px;">
    <div class="card">
        <h5 class="card-header">Archives</h5>
        <div class="card-body">
            <div>
                @if (count($archives)) @foreach ($archives as $archive)
                <li style="list-style-image: url({{ asset('img/file.png') }});"><a href="{{ route('home.archive', ['month'=>$archive->month,'year'=>$archive->year]) }}">{{ $archive->month_name }} {{ $archive->year }} ({{ $archive->num_of_posts }})</a></li>
                @endforeach
                <hr> @foreach ($archive_years as $archive_y)
                <li style="list-style-image: url({{ asset('img/file.png') }});"><a href="{{ route('home.archive', ['year'=>$archive_y->year]) }}">{{ $archive_y->year }} ({{ $archive_y->num_of_posts }})</a></li>
                @endforeach @else
                <div>
                    <h6>No archives yet...</h6>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>