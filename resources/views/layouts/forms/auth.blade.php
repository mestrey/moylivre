@extends('layouts.front', [ 'title' => $title, 'page' => $page ])

@section('content')
<div class="container">
    <div class="text-justify text-sm sm:text-base first-letter:text-5xl first-letter:font-bold first-letter:mr-2 first-letter:float-left">
        {{ $header }}
    </div>
    @yield('form')
    <div class="text-justify text-sm sm:text-base">
        {{ $footer }}
    </div>
    @yield('quote')
</div>
@endsection