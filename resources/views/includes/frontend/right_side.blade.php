@if (config('archive.archive_check'))
<div class="col-sm-12 col-lg-2 right-bar my-4">
    <div class="card">
        <h5 class="card-header text-center bg-light">Archives</h5>
        <div class="card-body p-0 m-3">
            <div>
                @if (count($archives)) @foreach ($archives as $archive)
                <li class="list-unstyled"><a href="{{ route('home.archive', ['month'=>$archive->month,'year'=>$archive->year]) }}"><i class="fa fa-calendar-o" aria-hidden="true"></i> {{ $archive->month_name }} {{ $archive->year }} ({{ $archive->num_of_posts }})</a></li>
                @endforeach
                <hr> @foreach ($archive_years as $archive_y)
                <li class="list-unstyled"><a href="{{ route('home.archive', ['year'=>$archive_y->year]) }}"><i class="fa fa-calendar" aria-hidden="true"></i> {{ $archive_y->year }} ({{ $archive_y->num_of_posts }})</a></li>
                @endforeach @else
                <div>
                    <h6>No archives yet...</h6>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endif