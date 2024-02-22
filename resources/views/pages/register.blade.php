@extends('layouts.forms.auth', [
'title' => 'Зарегистрироваться',
'page' => 11,
'header' => 'Регистрация – это процесс создания учетной записи пользователя для получения доступа к определенным функциям и ресурсам платформы. Это важный шаг, который обеспечивает персонализированный опыт взаимодействия с сайтом. При регистрации обычно запрашиваются различные данные, такие как электронная почта, логин и пароль. Эти учетные данные затем используются для аутентификации пользователя при последующих посещениях сайта. Регистрация может также включать в себя дополнительные шаги, такие как подтверждение по электронной почте или ввод дополнительной информации.',
'footer' => 'Преимущества регистрации включают доступ к персонализированным настройкам, сохранению предпочтений, участию в сообществе и возможности взаимодействия с контентом на более глубоком уровне. Однако важно быть внимательным к безопасности своих учетных данных, выбирая надежные пароли и следя за конфиденциальностью личной информации.',
])

<!--             $table->string('last');
            $table->string('first');

            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken(); -->

@section('form')
<form id="register" action="{{ route('register.post') }}" method="post" class="py-6">
    @csrf
    <div class="pb-4">
        <div class="error italic">Нам нужно будет запросить ваши геолокационные данные, чтобы определить ваше местоположение и позволить вам пользоваться нашим сервисом.</div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-4">
        <div class="flex sm:flex-row flex-col gap-2">
            <div>Имя:</div>
            <input class="w-full border-dotted border-b-2 border-black bg-transparent" type="text" name="first" value="{{ old('first') }}">
        </div>
        <div class="flex sm:flex-row flex-col gap-2">
            <div>Фамилия:</div>
            <input class="w-full border-dotted border-b-2 border-black bg-transparent" type="text" name="last" value="{{ old('last') }}">
        </div>
        <div class="flex sm:flex-row flex-col gap-2">
            <div>Почта:</div>
            <input class="w-full border-dotted border-b-2 border-black bg-transparent" type="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="flex sm:flex-row flex-col gap-2">
            <div>Пароль:</div>
            <input class="w-full border-dotted border-b-2 border-black bg-transparent" type="password" name="password">
        </div>
        <div class="flex sm:flex-row flex-col gap-2">
            <div>Подтверждение:</div>
            <input class="w-full border-dotted border-b-2 border-black bg-transparent" type="password" name="password_confirm">
        </div>
    </div>
    @if($errors->any())
    <div class="pt-4">
        <div class="error italic">
            @foreach ($errors->all() as $error)
            {{ $error }}<br />
            @endforeach
        </div>
    </div>
    @endif
    <div class="hidden">
        <input type="text" name="latitude" value="{{ old('latitude') }}">
        <input type="text" name="longitude" value="{{ old('longitude') }}">
    </div>
    <div class="pt-4">
        <button type="submit" class="flex flex-row gap-1 items-center">
            <div>Войти</div>
            <x-heroicon-o-arrow-right class="h-4" />
        </button>
    </div>
</form>

<script>
    const form = document.getElementById('register');

    form.addEventListener('submit', e => {
        e.preventDefault();
        e.stopPropagation();

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(position => {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                document.querySelector('input[name="latitude"]').value = latitude;
                document.querySelector('input[name="longitude"]').value = longitude;

                form.submit();
            }, error => {
                form.submit();
            });
        } else {
            form.submit();
        }
    });
</script>
@endsection

@section('quote')
<x-quote author="Джордж Оруэлл" quote="В эпоху обмана говорить правду — акт революционный" />
@endsection