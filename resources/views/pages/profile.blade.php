@extends('layouts.front', [ 'title' => 'Профиль', 'page' => 14 ])

@section('content')
<div class="container">
    <div>
        <span class="italic">МойЛивр:</span>
        <span>Здравствуйте, <span>{{ auth()->user()->last }}</span> {{ auth()->user()->first }}</span>
    </div>
</div>
@endsection