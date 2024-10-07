@extends('layouts.admin')

@section('title', 'Dashboard')

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

    <h1>Ajouter un utilisateur</h1>

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>
        
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" required>
        </div>
        
        <div class="form-group">
            <label for="password_confirmation">Confirmer votre mot de passe :</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
        
        <div class="form-group">
            <label for="role">Role :</label>
            <select name="role" id="role" required>
                <option value="" disabled selected>Choisissez un role</option>
                <option value="customer">Customer</option>
                <option value="employee">Employee</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter l'utilisateur</button>
    </form>
@endsection
