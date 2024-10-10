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
        <h1>Informations du service</h1>
        <p><strong>Nom : </strong>{{ $service->name }}</p>
        <p><strong>ID :</strong> {{ $service->id }}</p> 
        <p><strong>Prix :</strong> {{ $service->price }} €</p>
        <p><strong>Durée :</strong> {{ $service->duration }} minutes</p>
        <p><strong>Description :</strong> {{ $service->description }}</p>
        <p><strong>Date de création :</strong> {{ $service->created_at->format('d/m/Y') }}</p>
        <p><strong>derniere modification :</strong> {{ $service->updated_at->format('d/m/Y') }}</p>
    </div>
@endsection
