@extends('layouts.app')

@section('title', $title)

@section('app')
<div>
    <!-- <nav class="bg-orange-300">
        test
    </nav> -->

    @auth
    <p>U are a user</p>
    @endauth

    @guest
    <p>U are a guest</p>
    <a href="{{ route('login') }}">Login</a>
    @endguest

    @yield('content')
</div>
@endsection