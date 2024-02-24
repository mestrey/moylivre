@extends('layouts.forms.auth', [
'title' => 'Войти',
'page' => 8,
'header' => 'Логин - это учетная запись пользователя, позволяющая ему войти в систему или веб-приложение. Обычно логин используется для идентификации конкретного пользователя среди множества других пользователей. В большинстве случаев для входа в систему требуется комбинация из двух ключевых элементов: электронной почты (или логина) и пароля. Электронная почта часто выступает в качестве уникального идентификатора пользователя, а пароль служит секретным кодом для подтверждения его личности.',
'footer' => 'Для обеспечения безопасности учетной записи важно выбирать надежные пароли и регулярно их обновлять. Процесс входа с использованием логина, электронной почты и пароля является стандартным способом аутентификации, обеспечивающим доступ пользователя к персонализированным функциям и данным в онлайн-сервисах.',
])

@section('form')
<form action="{{ route('login.post') }}" method="post" class="py-6">
    @csrf
    <div class="flex flex-col sm:flex-row gap-x-6 gap-y-4">
        <div class="flex sm:flex-row flex-col gap-2">
            <div>Почта:</div>
            <input placeholder="ivan@ya.ru" class="border-dotted border-b-2 border-black bg-transparent" type="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="flex sm:flex-row flex-col gap-2">
            <div>Пароль:</div>
            <input placeholder="***" class="border-dotted border-b-2 border-black bg-transparent" type="password" name="password">
        </div>
    </div>
    @error('email')
    <div class="pt-4">
        <div class="error italic">{{ $message }}</div>
    </div>
    @enderror
    <div class="pt-4">
        <button type="submit" class="flex flex-row gap-1 items-center">
            <div>Войти</div>
            <x-heroicon-o-arrow-right class="h-4" />
        </button>
    </div>
</form>
@endsection

@section('quote')
<x-quote author="Фёдор Михайлович Достоевский" quote="Человек есть тайна. Ее надо разгадать, и ежели будешь ее разгадывать всю жизнь, то не говори, что потерял время; я занимаюсь этой тайной, ибо хочу быть человеком" />
@endsection