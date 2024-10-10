@extends('layouts.admin')

@section('title', 'Informations du paiement')

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

    
    <div class="card">
        <h1>Informations du paiment</h1>
        <p><strong>ID :</strong> {{ $payment->id }}</p> 
        <p><strong>Service :</strong> {{ $payment->appointment->service->name }} </p>
        <p><strong>Montant :</strong> {{ $payment->amount }} minutes</p>
        <p><strong>Statut :</strong> {{ $payment->payment_status }}</p>
        <p><strong>Date de création :</strong> {{ $payment->created_at->format('d/m/Y') }}</p>
        <p><strong>derniere modification :</strong> {{ $payment->updated_at->format('d/m/Y') }}</p>
    </div>
@endsection
