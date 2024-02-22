@extends('layouts.app', ['title' => $title])

@section('app')
<div>
    @include('partials.navbar.navbar')

    @yield('content')

    @include('partials.footer', ['page' => $page])
</div>
@endsection