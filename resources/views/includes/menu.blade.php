<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <form class="form-inline my-2 my-lg-0" action="/search" method="post">
        {{ csrf_field() }}
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="find">
            <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
        </form>

        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">English</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Eesti</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Русский</a>
            </li>
        </ul>

        <ul class="navbar-nav navbar-right">
        <!-- Authentication Links -->
        @if (Auth::guest())
            <li class="nav-item active"><a class="nav-link proba" href="{{ url('/login') }}">Login</a></li>
            <li class="nav-item active"><a class="nav-link proba" href="{{ url('/register') }}">Register</a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle proba" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                <li>
                <a class="nav-link" href="#">User glossary</a>
                    </li>
                    <li>
                    <a class="nav-link" href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
    </div>
</nav>