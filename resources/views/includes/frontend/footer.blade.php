<footer class="py-4 bg-dark">
    <div class="container text-white">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <h5 class="text-white">Contact</h5>
                <hr style="background-color: gray; margin: 5px 5px 5px 0px; width: 200px">
                Email: <a href="mailto:admin@example.com">admin@example.com</a>
                <hr class="d-lg-none bg-light">
                <h5 class="text-white mt-lg-3">Total Hits</h5>
                <hr style="background-color: gray; margin: 5px 5px 5px 0px; width: 200px">
                <!-- Start of CuterCounter Code -->
                <a href="http://www.cutercounter.com/" target="_blank"><img src="http://www.cutercounter.com/hits.php?id=gmropkpq&nd=6&style=3" border="0" alt="website counter"></a>
                <!-- End of CuterCounter Code -->
                <hr class="d-lg-none bg-light">
            </div>

            <div class="col-lg-4 footer-text-center">
                <h5 class="text-white">Important Links</h5>
                <hr style="background-color: gray; margin: 5px 5px 5px 0px; width: 200px">
                <a class="footer-color" href="{{ route('footer.about') }}">About Us</a> <br>
                <a class="footer-color" href="{{ route('footer.terms.condition') }}">Terms & Conditions</a> <br>
                <a class="footer-color" href="{{ route('footer.privacy.policy') }}">Privacy Policy</a>
                <hr class="d-lg-none bg-light">
            </div>
            <div class="col-lg-4 footer-text-right footer-color">
                <h5 class="text-white">Top Posts</h5>
                <hr style="background-color: gray; margin: 5px 5px 5px 0px; width: 200px">
                @if ($num_of_posts = $footer_posts->count()) @foreach ($footer_posts as $post)
                <a href="{{ route('post.single.page', ['token'=>$post->token]) }}" class="text-light footer-post-margin">{{ str_limit($post->title, 30) }}</a><br>                @if (--$num_of_posts)
                <hr class="mt-1 mb-1 d-none d-xl-block" style="background-color: #717070"> @endif @endforeach @endif
            </div>
        </div>
    </div>
</footer>

<footer class="text-white p-2" style="background-color: #2F2F2F">
    <p class="m-0 text-center">Copyright
    @include('includes.copyright') {{ config('app.name') }}. All rights reserved.
    </p>
</footer>