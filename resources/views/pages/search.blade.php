@extends('layouts.front', [ 'title' => 'Поиск', 'page' => 17 ])

@section('content')
<div class="container">

    <div class="flex flex-col items-center gap-4">
        <div class="text-center">
            Вижу всё, сквозь тьму и свет,<br />
            Все тайны я обнаружу в сети.<br />
            Искать могу вечно, день и ночь,<br />
            Как меня зовут?<br />
        </div>
        <div class="lg:w-[50%] xs:w-[75%] w-full">
            <form>
                @csrf
                <input hx-post="{{ route('search.post') }}" hx-trigger="keyup changed delay:500ms" hx-target="#search-results" placeholder="Маленький Нико..." name="search" type="text" class="border-dotted border-b-2 border-black bg-transparent w-full text-center">
            </form>
        </div>
    </div>
    <div class="flex justify-center pt-4">
        <div class="sm:max-w-[700px] max-w-[300px]">
            <div id="search-results">
                @include('partials.search.empty')
            </div>
        </div>
    </div>
</div>
@endsection