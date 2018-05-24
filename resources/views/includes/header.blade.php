<header>
    <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #e3f2fd;">

            <a class="navbar-brand" href="{{ route('dashboard') }}">Social</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @if(Auth::check())
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('dashboard') }}">Home<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search user" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <ul class="nav navbar-nav navber-right">
                    <li style="padding-left: 30px;"><a href="{{ route('account') }}" style="text-decoration: none;">Account</a></li>
                    <li style="padding-left: 30px;"><a href="{{ route('logout') }}" style="text-decoration: none;">Logout</a></li>
                </ul>
            </div>
            @endif

    </nav>
</header>