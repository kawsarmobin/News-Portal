<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Summify</title>

        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap core CSS -->

        <!-- Custom styles for this template -->
        <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Toaster Css -->
        <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

    </head>

    <body>

        <div id="app">
            <!-- Navigation -->
            <nav class="navbar navbar-expand-lg fixed-top color-main navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">Summify</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav main-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('/*')?'active':'' }}" href="{{ url('/') }}">
                                    <i class="fa fa-home" aria-hidden="true"></i> Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            @if (auth()->check())
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('own-posts/create')?'active':'' }}" href="{{ route('own-posts.create') }}">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Post
                                </a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('all-topic')?'active':'' }}" href="{{ route('topic.follows.index') }}">
                                    <i class="fa fa-th-list" aria-hidden="true"></i> Topic
                                </a>
                            </li>
                            @if (config('archive.archive_check'))
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('archives')?'active':'' }}" href="{{ route('archives.index') }}">
                                    <i class="fa fa-archive" aria-hidden="true"></i> Archive
                                </a>
                            </li>
                            @endif
                            @if (auth()->check())
                            <div class="btn-group">
                                <a class="nav-link profile" href="#" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    @if (auth()->user()->avatar)
                                    <img width="25px" class="rounded-circle"
                                        src="{{ auth()->user()->avatar_thumbnail }}" width="80%" alt="">
                                    @else
                                    <img width="25px" class="rounded-circle" src="{{ asset('img/avatar.gif') }}"
                                        width="80%" alt="">
                                    @endif
                                    Profile
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item profile-item {{ Request::is('own-posts')?'active':'' }}" href="{{ route('own-posts.index') }}">My
                                        Posts</a>
                                    <a class="dropdown-item profile-item {{ Request::is('posts-link-list')?'active':'' }}" href="{{ route('own-posts.post_link') }}">My
                                        Posts Link</a>
                                    <a class="dropdown-item profile-item {{ Request::is('profile')?'active':'' }}" href="{{ route('profile.index') }}">My
                                        Information</a>
                                    <a class="dropdown-item profile-item {{ Request::is('topics')?'active':'' }}" href="{{ route('topics.index') }}">My
                                        Topics</a>
                                    <a class="dropdown-item profile-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                            @else
                            <div class="btn-group">
                                <a class="profile nav-link" href="{{ route('login') }}"> <i
                                        class="fa fa-sign-in text-gray"></i> Sign In</a>
                            </div>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <div class="container page-content">
                <div class="row justify-content-center">
                    @yield('content')
                </div>
            </div>

            <!-- Footer -->
            @include('includes.frontend.footer')
        </div>

        <!-- Bootstrap core JavaScript -->
        <script src="{{ asset('js/app.js') }}"></script>

        <script src="{{ asset('master/plugins/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('master/js/pages/forms/editors.js') }}"></script>
        <script type="text/javascript">
            CKEDITOR.replace('ckeditor', {
                width: 620,
                height: 100,
            });

        </script>

        <!-- Toastr Js -->
        <script src="{{ asset('js/toastr.min.js') }}"></script>
        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
            @endif

            @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}")
            @endif

        </script>
        <script type="text/javascript">
            function CopyToClipboard(containerid) {
                if (document.selection) {
                    var range = document.body.createTextRange();
                    range.moveToElementText(document.getElementById(containerid));
                    range.select().createTextRange();
                    document.execCommand("copy");
                    toastr.info("Copied");
                    setTimeout(() => {
                        location.reload();
                    }, 1000);

                } else if (window.getSelection) {
                    var range = document.createRange();
                    range.selectNode(document.getElementById(containerid));
                    window.getSelection().addRange(range);
                    document.execCommand("copy");
                    toastr.info("Copied");
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                }
            }

        </script>
    </body>

</html>
