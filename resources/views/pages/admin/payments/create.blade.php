@extends('layouts.admin')

@section('title', 'Ajouter un paiment')

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
        
        <form action="{{ route('admin.payments.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="appointment_id">Rendez-vous :</label>
                <select name="appointment_id" id="appointment_id">
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
                <label for="payment_status">Statut :</label>
                <select name="payment_status" id="payment_status">
                    <option selected disabled value="">Choisissez un statut</option>
                    <option value="pending">Pending</option>
                    <option value="paid">Paid</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="payment_date">Date :</label>
                <input type="date" name="payment_date" id="payment_date">
            </div>
            
            <button type="submit" class="btn btn-primary">Ajouter le service</button>
        </form>
    </div>
@endsection
