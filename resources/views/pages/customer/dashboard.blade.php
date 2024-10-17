@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    @if (session('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
    @elseif (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif
    
    <h1>Dashboard</h1>
    <p>Vous êtes connecté !</p>
    <ul>
        <li>Nom : {{ $user->name}}</li>
        <li>Role : {{ $user->role}}</li>
        <li>Email : {{ $user->email }}</li>
    </ul>
</div>
@endsection
