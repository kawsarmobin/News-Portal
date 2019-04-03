<!-- Menu -->
<div class="menu">
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{ Request::is('dashboard')?'active':'' }}">
            <a href="{{ route('home') }}">
                <i class="material-icons">home</i>
                <span>Home</span>
            </a>
        </li>
        @if (config('topics.topic_post_check'))    
        <li class="{{ Request::is('admin/topics')?'active':'' }}">
            <a href="{{ route('admin.topics.index') }}">
                <i class="material-icons">text_fields</i>
                <span>Topics</span>
            </a>
        </li>
        @endif
        <li class="{{ Request::is('admin/posts*')?'active':'' }}">
            <a href="{{ route('admin.posts.index') }}">
                <i class="material-icons">layers</i>
                <span>Posts</span>
            </a>
        </li>
        <li class="{{ Request::is('admin/users')?'active':'' }}">
            <a href="{{ route('admin.users.index') }}">
                <i class="material-icons">supervised_user_circle</i>
                <span>Users</span>
            </a>
        </li>
        <li class="{{ Request::is('*/create')?'active':'' }}">
            <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">trending_down</i>
                    <span>Footer</span>
                </a>
            <ul class="ml-menu">
                <li class="{{ Request::is('about/create')?'active':'' }}">
                    <a href="{{ route('about.create') }}">
                        <span>About</span>
                    </a>
                </li>
                <li class="{{ Request::is('terms/create')?'active':'' }}">
                    <a href="{{ route('terms.create') }}">
                        <span>Terms</span>
                    </a>
                </li>
                <li class="{{ Request::is('privacy/create')?'active':'' }}">
                    <a href="{{ route('privacy.create') }}">
                        <span>Privacy</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<!-- #Menu -->