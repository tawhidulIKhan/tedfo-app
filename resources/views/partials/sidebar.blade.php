<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('home') }}">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('post.index') }}">
                    <span data-feather="file"></span>
                    Posts
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('category.index') }}">
                    <span data-feather="file"></span>
                    Categories
                </a>
            </li>
        </ul>

    </div>
</nav>
