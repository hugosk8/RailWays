@extends('layouts.admin')

@section('title', 'Liste des utilisateurs')

@section('content')
    @if (session('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
    @elseif (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <h1>Liste des utilisateurs</h1>

    <table>
        <thead>
            <tr>
                <td>Nom</td>
                <td>Role</td>
                <td>Email</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
