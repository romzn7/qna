<ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="{{ route('home') }}">Home</a></li>
        @if (Auth::check())
                <li role="presentation"><a href="{{ route('logout') }}">Logout({{ Auth::user()->username }})</a></li>
        @else
                <li role="presentation"><a href="{{ route('register') }}">Register</a></li>
                <li role="presentation"><a href="{{ route('login') }}">Login</a></li>
        @endif
</ul>