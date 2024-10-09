@extends('layouts.guest')

@section('title', 'Login')

@section('content')
    <x-auth-session-status :status="session('status')" />

    <div class="form-container">
        <h1>Connexion :</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
    
            <div class="form-group">
                <x-input-label for="email" :value="__('Email :')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" />
            </div>
    
            <div class="form-group">
                <x-input-label for="password" :value="__('Mot de passe :')" />
                <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" />
            </div>
    
            <div class="form-group">
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span>{{ __('Se souvenir de moi') }}</span>
                </label>
            </div>
    
            <div class="form-group">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié?') }}
                    </a>
                @endif
            </div>
    
            <x-primary-button class="btn">
                {{ __('Se connecter') }}
            </x-primary-button>
        </form>
    </div>
@endsection