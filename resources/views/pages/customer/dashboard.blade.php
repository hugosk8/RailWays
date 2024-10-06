@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard</h1>
    <p>Vous êtes connecté !</p>
    <ul>
        <li>Nom : {{ $user->name}}</li>
        <li>Role : {{ $user->role}}</li>
        <li>Email : {{ $user->email }}</li>
    </ul>
@endsection
