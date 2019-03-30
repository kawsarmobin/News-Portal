<footer class="py-4 bg-dark">
    <div class="container text-white">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <label class="footer-color" for="">Contact</label> <br>
                Email: <a href="mailto:admin@example.com">admin@example.com</a>
                <hr class="d-lg-none bg-light">
            </div>
            
            <div class="col-lg-4 footer-text-center">
                <a class="footer-color" href="">About Us</a> <br>
                <a class="footer-color" href="">Terms & Conditions</a> <br>
                <a class="footer-color" href="">Privacy Policy</a>
                <hr class="d-lg-none bg-light">
            </div>
            <div class="col-lg-4 footer-text-right footer-color"> 
                @if ($num_of_posts = $footer_posts->count())
                    @foreach ($footer_posts as $post)
                        <a href="{{ route('post.single.page', ['token'=>$post->token]) }}" class="text-light footer-post-margin">{{ str_limit($post->title, 30) }}</a><br>
                        @if (--$num_of_posts)
                            <hr class="mt-1 mb-1 d-none d-xl-block" style="background-color: #ad2929">
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</footer>

<footer class="text-white p-2" style="background-color: #2F2F2F">
    <p class="m-0 text-center">Copyright
        @include('includes.copyright') Summify. All rights reserved.
    </p>
</footer>