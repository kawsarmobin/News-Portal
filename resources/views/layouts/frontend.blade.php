<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Summify</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    
    <!-- Custom styles for this template -->
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <!-- Toaster Css -->
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top color-main">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Summify</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                        aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">
                            @include('includes.frontend.homeSV') <span>Home |</span>
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    
                    @if (auth()->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('own-posts.create') }}">@include('includes.frontend.postSV') Post |</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('topic.follows.index') }}">@include('includes.frontend.topicSV') Topic |</a>
                    </li>
                    @if (auth()->check())
                        <div class="btn-group">
                            <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if (auth()->user()->avatar)
                                    <img width="30px" class="rounded-circle" src="{{ auth()->user()->avatar_thumbnail }}" width="80%" alt="">
                                @else
                                    <img width="30px" class="rounded-circle" src="{{ asset('img/avatar.gif') }}" width="80%" alt="">
                                @endif
                                Profile
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('own-posts.index') }}">My Posts</a>
                                <a class="dropdown-item" href="{{ route('profile.index') }}">My Information</a>
                                <a class="dropdown-item" href="{{ route('topics.index') }}">My Topics</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
            
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="btn-group">
                            <a class="nav-link" href="{{ route('login') }}"> <i class="fa fa-sign-in text-gray"></i>  Sign In</a>                         
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
    <footer class="py-3 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Summify 2019</p>
        </div>
        <!-- /.container -->
    </footer>

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
    <script src="{{ asset('js/toastr.min.js') }}"></script><script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "4000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
        
    </script>
</body>

</html>