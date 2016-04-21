<ul class="nav navbar-nav navbar-right hidden-xs">
    <li>
        <a href="javascript:;" class="ripple" data-toggle="dropdown">
            <img src="@if(! auth()->user()->image) {!! asset('images/avatar.jpg') !!} @else {!! asset(auth()->user()->image) !!} @endif" class="header-avatar img-circle" alt="user" title="user">
            <span>{!! auth()->user()->name !!}</span>
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            @role('Administrator')
            <li>
                <a href="{!! url('admin/dashboard') !!}">Administrare</a>
            </li>
            @endauth
            <li>
                <a href="{!! route('frontend.dashboard') !!}">Profil</a>
            </li>
            <li>
                <a href="{!! url('auth/logout') !!}">Logout</a>
            </li>
            @if(count(\Session::get('user_organization')) == 1)
            <li>
                <a href="{!! route('user.oragnizations') !!}">Switch Organization</a>
            </li>
            @endif
        </ul>
    </li>
</ul>