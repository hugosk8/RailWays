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

    <h1>Informations du service</h1>
    
    <div class="user-card">
        <h2><span>Nom : </span>{{ $service->name }}</h2>
        <p><strong>ID :</strong> {{ $service->id }}</p> 
        <p><strong>Prix :</strong> {{ $service->price }} €</p>
        <p><strong>Durée :</strong> {{ $service->duration }} minutes</p>
        <p><strong>Description :</strong> {{ $service->description }}</p>
        <p><strong>Date de création :</strong> {{ $service->created_at->format('d/m/Y') }}</p>
        <p><strong>derniere modification :</strong> {{ $service->updated_at->format('d/m/Y') }}</p>
    </div>
@endsection
