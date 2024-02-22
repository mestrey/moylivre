<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('profile');
        }

        return back()->withErrors([
            'email' => 'Предоставленные данные не соответствуют нашим записям.',
        ])->withInput($request->only('email'));
    }

    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'last' => ['required'],
            'first' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
            'password_confirm' => ['required', 'same:password']
        ], [], [
            'last' => 'Фамилия',
            'first' => 'Имя',
            'email' => 'E-mail',
            'password' => 'Пароль',
            'password_confirm' => 'Подтверждение пароля'
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        $user->roles()->attach(Role::USER->value);

        auth()->login($user);
        $request->session()->regenerate();

        return redirect()->route('profile');
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('home');
    }
}
