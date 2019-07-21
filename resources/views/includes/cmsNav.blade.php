<nav class="navbar navbar-expand-lg navbar-light">
    <div class="navbar-nav">
        <a href="{{url('/cms/dashboard')}}" class="nav-item nav-link link linkAbout {{Str::contains(request()->url(), '/cms/dashboard') ? 'active' : ''}}">Dashboard</a>
        <a href="{{url('/cms/novels')}}" class="nav-item nav-link link linkAbout {{Str::contains(request()->url(), '/cms/novels') ? 'active' : ''}}">Novels</a>
        <a href="{{url('/cms/users')}}" class="nav-item nav-link link linkAbout {{Str::contains(request()->url(), '/cms/users') ? 'active' : ''}}">Users</a>
        <a href="{{url('/novels')}}" class="nav-item nav-link link linkAbout">Go back to website..</a>
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

                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</nav>