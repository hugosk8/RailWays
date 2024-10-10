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

    
    <div class="card">
        <h1>Informations de l'utilisateur</h1>
        <p><strong>Nom : </strong>{{ $user->name }}</p>
        <p><strong>ID :</strong> {{ $user->id }}</p> 
        <p><strong>Email :</strong> {{ $user->email }}</p>
        <p><strong>Rôle :</strong> {{ ucfirst($user->role) }}</p>
        <p><strong>Date de création :</strong> {{ $user->created_at->format('d/m/Y') }}</p>
        <p><strong>derniere modification :</strong> {{ $user->updated_at->format('d/m/Y') }}</p>
    </div>
@endsection
