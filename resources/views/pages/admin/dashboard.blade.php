@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    @if (session('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
    @endif

    <h1>Admin Dashboard</h1>
    <p>Vous êtes connecté en tant qu'admin !</p>
    <ul>
        <li>Nom : {{ $user->name}}</li>
        <li>Role : {{ $user->role}}</li>
        <li>Email : {{ $user->email }}</li>
    </ul>
@endsection
