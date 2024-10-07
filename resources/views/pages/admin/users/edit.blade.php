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

    <h1>Modifier l'utilisateur</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nom :</label>
            <span>Actuel : {{ $user->name }}</span>
            <input type="text" name="name" id="name" placeholder="Laissez vide si non modifié">
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <span>Actuel : {{ $user->email }}</span>
            <input type="email" name="email" id="email" placeholder="Laisser vide si non modifié">
        </div>

        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" placeholder="Laisser vide si non modifié">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmer le mot de passe :</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Laisser vide si non modifié">
        </div>

        <div class="form-group">
            <label for="role">Rôle :</label>
            <span>Actuel : {{ $user->role }}</span>
            <select name="role" id="role">
                <option value="" disabled selected>Laisser vide si non modifié</option>
                <option value="customer">Customer</option>
                <option value="employee">Employee</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
