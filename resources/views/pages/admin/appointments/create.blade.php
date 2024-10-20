@extends('layouts.admin')

@section('title', 'Ajouter un service')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-container">
        <h1>Ajouter un Rendez-vous</h1>
    
        <form action="{{ route('admin.appointments.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="user_id">Client :</label>
                <select name="user_id" id="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="service_id">Prestation :</label>
                <select name="service_id" id="service_id">
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date">Date :</label>
                <input type="date" name="date" id="date">
            </div>
            
            <div class="form-group">
                <label for="status">Statut :</label>
                <select name="status" id="status">
                    <option value="scheduled" selected>Programmé</option>
                    <option value="canceled">Annulé</option>
                    <option value="completed">terminé</option>
                </select>
            </div>
    
            <button type="submit" class="btn btn-primary">Ajouter le service</button>
        </form>
    </div>
</div>
@endsection
