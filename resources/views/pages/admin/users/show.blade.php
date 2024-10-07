@extends('layouts.admin')

@section('title', 'Informations de l\'utilisateur')

@section('content')
    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>Informations de l'utilisateur</h1>
    
    <div class="user-card">
        <h2><span>Nom : </span>{{ $user->name }}</h2>
        <p><strong>ID :</strong> {{ $user->id }}</p> 
        <p><strong>Email :</strong> {{ $user->email }}</p>
        <p><strong>Rôle :</strong> {{ ucfirst($user->role) }}</p>
        <p><strong>Date de création :</strong> {{ $user->created_at->format('d/m/Y') }}</p>
        <p><strong>derniere modification :</strong> {{ $user->updated_at->format('d/m/Y') }}</p>
    </div>
@endsection
