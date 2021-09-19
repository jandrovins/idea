<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>@yield('title','Idea')</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/customStyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sideBar.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/idea_logo.ico') }}" />
</head>

<body>
    <div id="app">
        <div class="sidebar-container">
            <ul class="sidebar-navigation">
                <li class="header">@lang('lang.nav')</li>
                <li>
                    <a href="{{route('home.index')}}">
                        <i class="fa fa-home" aria-hidden="true"></i> @lang('lang.home')
                    </a>
                </li>
                <li class="header">@lang('lang.student_opt')</li>
                <li>
                    <a href="{{route('lesson.show',1)}}">
                        <i class="fa fa-home" aria-hidden="true"></i> @lang('lang.show_lesson_bttn')
                    </a>
                </li>
                <li class="header">@lang('lang.admin_opt')</li>
                <li>
                    <a href="{{route('admin.lesson.create',1)}}">
                        <i class="fa fa-home" aria-hidden="true"></i> @lang('lang.create_lesson_bttn')
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.lesson.manage',1)}}">
                        <i class="fa fa-home" aria-hidden="true"></i> @lang('lang.manage_lesson')
                    </a>
                </li>
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