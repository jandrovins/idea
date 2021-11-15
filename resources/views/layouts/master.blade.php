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
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/favicon.ico') }}"/>
    <!-- Fonts Awesome -->
    <script src="https://use.fontawesome.com/a1f9742360.js"></script>
</head>

<body>
<!--Language-->
<div class="float-right m-3">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            @lang('messages.languages')
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
            @foreach(config('app.available_locales') as $locale_name => $available_locale)
                @if($available_locale === App::getLocale())
                    <a class="dropdown-item inactiveLink" href="#!">
                        <i class="text-secondary">{{$locale_name}}</i>
                    </a>
                @else
                    <a class="dropdown-item" href="{{ route('locale.switch', ['locale' => $available_locale]) }}">
                        <i class="text-primary">{{$locale_name}}</i>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</div>
<div class="sidebar-container d-flex flex-column justify-content-between">
    <ul id="top-nav" class="sidebar-navigation">
        <div class="flex row justify-content-center">
            <img class="rounded img-thumbnail img-responsive xsm m-2" src="{{ asset('/img/idea-logo-sm.jpeg') }}"
                 alt="@lang(" messages.course.image")">
        </div>
        <!--Admin Sidebar-->
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
    <ul id="footer" class="sidebar-navigation sidebar-footer">
        @guest
            <li class="header mt-10">@lang('messages.hello') @lang('messages.guest')</li>
            <li><a href="{{ route('login') }}">@lang('messages.auth.login')</a></li>
            <li><a href="{{ route('register') }}">@lang('messages.auth.register')</a></li>
        @else
            <div class="flex row justify-content-center">
                <img class="rounded img-thumbnail img-responsive xsm m-2" src="{{ asset(Auth::User()->getImage()) }}"
                     alt="@lang(" messages.course.image")">
            </div>
            <li class="header">@lang('messages.hello') {{ Auth::user()->getName() }}</li>
            <li><a href="" onclick="event.preventDefault();logout.submit();">@lang('messages.auth.logout')</a></li>
            <form id="logout" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endguest
        <li class="header">
            <a class="mx-4" href="https://github.com/jandrovins/idea">
                <i class="fa fa-3x fa-github"></i>
            </a>
        </li>
    </ul>
</div>
<main class="py-4">
    @yield('content')
</main>
<!-- Footer -->
<div id="footer-pos">
    @include('layouts.footer')
</div>
</body>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</html>
