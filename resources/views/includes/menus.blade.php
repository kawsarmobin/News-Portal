<!-- Menu -->
<div class="menu">
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
            <a href="{{ route('home') }}">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
        </li>
        <li>
            <a href="{{ route('admin.posts.index') }}">
                <i class="material-icons">home</i>
                <span>Posts</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">trending_down</i>
                    <span>Footer</span>
                </a>
            <ul class="ml-menu">
                <li>
                    <a href="{{ route('about.create') }}">
                        <span>About</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('terms.create') }}">
                        <span>Terms</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('privacy.create') }}">
                        <span>Privacy</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">trending_down</i>
                    <span>Multi Level Menu</span>
                </a>
            <ul class="ml-menu">
                <li>
                    <a href="javascript:void(0);">
                            <span>Menu Item</span>
                        </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                            <span>Menu Item - 2</span>
                        </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>Level - 2</span>
                        </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="javascript:void(0);">
                                    <span>Menu Item</span>
                                </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Level - 3</span>
                                </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="javascript:void(0);">
                                            <span>Level - 4</span>
                                        </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</div>
<!-- #Menu -->