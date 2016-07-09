@extends('power-management.common.base')

@section('sidebar-header')
@endsection

@section('framework-navigation')
    <li class="dropdown">
        <a href="#" class="dropdown-toggle"
           data-toggle="dropdown">Hi, {{ Auth::guard(config('power-m.auth.guard'))->user()->account }}</a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('power-m.auth.logout') }}">Logout</a></li>
        </ul>
    </li>
@endsection