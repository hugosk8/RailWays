@extends('layouts.admin')

@section('title', 'Ajouter un service')

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

    <div class="form-container">
        <h1>Ajouter un service</h1>
    
        <form action="{{ route('admin.services.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            </div>
            
            <div class="form-group">
                <label for="price">Prix :</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}" required>
            </div>
            
            <div class="form-group">
                <label for="duration">Durée :</label>
                <input type="number" name="duration" id="duration" required>
            </div>
            
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
            </div>
    
            <button type="submit" class="btn btn-primary">Ajouter le service</button>
        </form>
    </div>
@endsection
