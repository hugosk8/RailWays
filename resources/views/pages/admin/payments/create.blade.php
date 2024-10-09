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
        <h1>Ajouter un paiement</h1>
    
        <form action="{{ route('admin.services.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="appointment">Rendez-vous :</label>
                <select name="appointment" id="appointment">
                    <option selected disabled value="">Choisissez un rendez-vous</option>
                    @foreach ($appointments as $appointment)
                        <option value="{{ $appointment->id }}">{{ $appointment->user->name . " le " . $appointment->appointment_date . " à " . $appointment->appointment_time  }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="amount">Montant :</label>
                <input type="number" name="amount" id="amount" placeholder="Montant du paiement" value="{{ old('amount') }}" required>
            </div>
            
            <div class="form-group">
                <label for="status">Statut :</label>
                <select name="status" id="status">
                    <option selected disabled value="">Choisissez un statut</option>
                    <option value="pending">Pending</option>
                    <option value="paid">Paid</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="date">Date :</label>
                <input type="date" name="date" id="date">
            </div>
    
            <button type="submit" class="btn btn-primary">Ajouter le service</button>
        </form>
    </div>
@endsection
