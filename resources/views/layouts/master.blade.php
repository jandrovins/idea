<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title','Idea')</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/custom-styles.css') }}" rel="stylesheet">
    @if (Auth::user() and Auth::user()->getUserKind() === 'admin')
        <link href="{{ asset('css/sideBarAdmin.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('css/sideBar.css') }}" rel="stylesheet">
    @endif
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/idea_logo.ico') }}" />
    <!-- Fonts Awesome -->
    <script src="https://use.fontawesome.com/a1f9742360.js"></script>
</head>
<body>
    <div id="app">
        <div class="sidebar-container">
            <ul class="sidebar-navigation">
                @if (Auth::user() and Auth::user()->getUserKind() === 'admin')
                    <li class="header">@lang('messages.admin.nav')</li>
                    <li>
                        <a href="{{route('admin.home.index')}}">
                            <i class="fa fa-user-circle" aria-hidden="true"></i> @lang('messages.admin.index.title')
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.courses.list')}}">
                            <i class="fa fa-cog" aria-hidden="true"></i> @lang('messages.course.manage')
                        </a>
                    </li>
                @endif
                <li class="header">@lang('messages.nav')</li>
                <li>
                    <a href="{{route('home.index')}}">
                        <i class="fa fa-home" aria-hidden="true"></i> @lang('messages.home')
                    </a>
                </li>
                <li class="header">@lang('messages.student_opt')</li>
                <li>
                    <a href="{{route('courses.listAll')}}">
                        <i class="fa fa-folder" aria-hidden="true"></i> @lang('messages.course.store')
                    </a>
                </li>
                <li>
                    <a href="{{route('courses.list')}}">
                        <i class="fa fa-folder" aria-hidden="true"></i> @lang('messages.course.enroll')
                    </a>
                </li>
                <li>
                    <a href="{{route('courses.listOwn')}}">
                        <i class="fa fa-folder" aria-hidden="true"></i> @lang('messages.course.welcome')
                    </a>
                </li>
                <li>
                    <a href="{{route('courses.listTop')}}">
                        <i class="fa fa-folder" aria-hidden="true"></i> @lang('messages.course.listTop')
                    </a>
                </li>
            </ul>
        </ul>
        <ul class="sidebar-navigation sidebar-footer">
            @guest
            <li class="header"> Hello guest.</li>
            <li><a href="{{ route('login') }}">@lang('messages.auth.login')</a></li>
            <li><a href="{{ route('register') }}">@lang('messages.auth.register')</a></li>
            @else
            <li class="header">Hello {{ Auth::user()->getName() }}</li>
            <li><a href="" onclick="event.preventDefault();logout.submit();">@lang('messages.auth.logout')</a></li>
            <form id="logout" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            @endguest
        </ul>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</html>
