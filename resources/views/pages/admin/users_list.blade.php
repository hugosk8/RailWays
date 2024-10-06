@extends('layouts.admin')

@section('title', 'Liste des utilisateurs')

@section('content')
    <h1>User list</h1>

    <ul>
        @foreach ($users as $user)
        <ul>
            <li>
                {{ $user->name }}
            </li>
            <li>
                {{ $user->email }}
            </li>
            <li>
                {{ $user->role }}
            </li>
        </ul>
        @endforeach
    </ul>
@endsection