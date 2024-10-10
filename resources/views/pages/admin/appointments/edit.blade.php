@extends('layouts.admin')

@section('title', 'Modifier l\'utilisateur')

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

    <h1>Modifier le rendez-vous</h1>

    <form action="{{ route('admin.appointments.update', $appointment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nom :</label>
            <span>Actuel : {{ $appointment->name }}</span>
            <input type="text" name="name" id="name" placeholder="Laisser vide si non modifié">
        </div>

        <div class="form-group">
            <label for="email">Prix :</label>
            <span>Actuel : {{ $appointment->price }} €</span>
            <input type="number" name="price" id="price" placeholder="Laisser vide si non modifié">
        </div>

        <div class="form-group">
            <label for="password">Durée :</label>
            <span>Actuel : {{ $appointment->duration }} minutes</span>
            <input type="number" name="duration" id="duration" placeholder="Laisser vide si non modifié">
        </div>

        <div class="form-group">
            <label for="role">Description :</label>
            <span>Actuel : {{ $appointment->description }}</span>
            <textarea name="description" id="description" cols="30" rows="10" placeholder="Laisser vide si non modifié"></textarea>

        <button type="submit" class="btn">Mettre à jour</button>
    </form>
@endsection
