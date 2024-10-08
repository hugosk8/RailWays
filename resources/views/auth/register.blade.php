@extends('layouts.guest')

@section('title', 'Login')

@section('content')
    <div class="form-container">
        <h1>Inscription :</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <x-input-label for="name" :value="__('Nom :')" />
                <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" />
            </div>

            <div class="form-group">
                <x-input-label for="email" :value="__('Email :')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" />
            </div>

            <div class="form-group">
                <x-input-label for="password" :value="__('Mot de passe :')" />
                <x-text-input id="password" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" />
            </div>

            <div class="form-group">
                <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe :')" />
                <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" />
            </div>

            <div class="form-group">
                <a href="{{ route('login') }}">
                    {{ __('Déja un compte?') }}
                </a>
            </div>
                
                <x-primary-button>
                    {{ __('Créer un compte') }}
                </x-primary-button>
            </form>
        </div>
@endsection
