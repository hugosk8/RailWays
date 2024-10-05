@extends('layouts.guest')

@section('title', 'Mot de passe oublié')

@section('content')
    <h1>Récuperation du mot de passe :</h1>
    <p>Mot de passe oublié? Pas de probleme. Renseignez votre adresse email et vous allez recevoir un lien de récuperation pour en chosir un nouveau.</p>

    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" />

    <div class="form-container">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
    
            <!-- Email Address -->
            <div class="form-group">
                <x-input-label for="email" :value="__('Email :')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" />
            </div>
    
            <div class="form-group">
                <x-primary-button>
                    {{ __('Récuperer le mot de passe') }}
                </x-primary-button>
            </div>
        </form>
    </div>
@endsection
