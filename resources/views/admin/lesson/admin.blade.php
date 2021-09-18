<!--
    Based on https://www.sliderrevolution.com/resources/bootstrap-sidebar/
    Author: Daan Vankerkom
-->

<link href="{{ asset('css/sideBar.css') }}" rel="stylesheet">
<div class="sidebar-container">
    <div class="sidebar-logo">
        @lang('lang.admin')
    </div>
    <ul class="sidebar-navigation">
        <li class="header">@lang('lang.nav')</li>
        <li>
            <a href="{{route('home.index')}}">
                <i class="fa fa-home" aria-hidden="true"></i> @lang('lang.home')
            </a>
        </li>
        <li>
            <a href="{{route('home.index')}}">
                <i class="fa fa-home" aria-hidden="true"></i> More Options :p
            </a>
        </li>
    </ul>
</div>