<nav class="navbar navbar-expand-lg navbar-light mainNavbar">
    <span class="navbar-brand">Novel Heaven</span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse linksContainer" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link link linkAbout"
               href="{{url('/')}}">About</a>

            {{--<a class="nav-item nav-link link {{Str::contains(request()->url(), '/news') ? 'active' : ''}}"
               href="{{url('/news')}}">News</a>--}}

            <a class="nav-item nav-link link {{Str::contains(request()->url(), '/novels') ? 'active' : ''}}"
               href="{{url('/novels')}}">Novels</a>

            <a class="nav-item nav-link link {{Str::contains(request()->url(), '/contact') ? 'active' : ''}}"
               href="{{url('/contact')}}">Contact</a>

            @guest

            @else
                @if(Auth::user()->isStaff())
                    <a class="nav-item nav-link link {{Str::contains(request()->url(), '/cms/dashboard') ? 'active' : ''}}"
                       href="{{url('/cms/dashboard')}}">CMS</a>
                @endif
            @endguest
        </div>

        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link auth" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link auth" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle authLoggedIn" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
