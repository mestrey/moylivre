@extends('layouts.front', [ 'title' => 'Войти' ])

@section('content')
<p>Войти</p>
<form action="{{ route('login.post') }}" method="post">
    @csrf
    <input type="text" name="email" placeholder="Почта" value="{{ old('email') }}">
    <input type="password" name="password" placeholder="Пароль">
    <button type="submit">Войти</button>
</form>
@endsection