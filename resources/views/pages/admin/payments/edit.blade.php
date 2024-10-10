@extends('layouts.admin')

@section('title', 'Modifier l\'utilisateur')

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

    <h1>Modifier un paiement</h1>

    <form action="{{ route('admin.payments.update', $payment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="appointment_id">Rendez-vous :</label>
            <span>Actuel : {{ $payment->appointment->user->name . " le " . $payment->appointment->appointment_date . " à " . $payment->appointment->appointment_time  }}</span>
            <select name="appointment_id" id="appointment_id">
                <option selected disabled value="">Laisser vide si non modifié</option>
                @foreach ($appointments as $appointment)
                    <option value="{{ $appointment->id }}">{{ $appointment->user->name . " le " . $appointment->appointment_date . " à " . $appointment->appointment_time  }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="amount">Montant :</label>
            <span>Actuel : {{ $payment->amount }}€</span>
            <input type="number" name="amount" id="amount" placeholder="Laisser vide si non modifié" value="{{ old('amount') }}">
        </div>
        
        <div class="form-group">
            <label for="payment_status">Statut :</label>
            <span>Actuel : {{ $payment->payment_status }}</span>
            <select name="payment_status" id="payment_status">
                <option selected disabled value="">Laisser vide si non modifié</option>
                <option value="pending">Pending</option>
                <option value="paid">Paid</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="payment_date">Date :</label>
            <span>Actuel : {{ $payment->payment_date }}</span>
            <input type="text" name="payment_date" id="payment_date" placeholder="Laisser vide si non modifié">
        </div>

        <button type="submit" class="btn">Mettre à jour</button>
    </form>

    <script>
        const dateInput = document.getElementById('payment_date');
        dateInput.addEventListener("click", () => {
            dateInput.setAttribute('type', 'date');
        })
    </script>
@endsection

