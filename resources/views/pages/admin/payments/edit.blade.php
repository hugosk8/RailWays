@extends('layouts.admin')

@section('title', 'Modifier l\'utilisateur')

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

    <h1>Modifier un paiement</h1>

    <form action="{{ route('admin.payments.update', $payment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="appointment_id">Rendez-vous :</label>
            <span>Actuel : {{ $payment->appointment->user->name . " le " . $payment->appointment->date }}</span>
            <select name="appointment_id" id="appointment_id">
                <option selected disabled value="">Laisser vide si non modifié</option>
                @foreach ($appointments as $appointment)
                    <option value="{{ $appointment->id }}">{{ $appointment->user->name . " le " . $appointment->date }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="amount">Montant :</label>
            <span>Actuel : {{ $payment->amount }}€</span>
            <input type="number" name="amount" id="amount" placeholder="Laisser vide si non modifié" value="{{ old('amount') }}">
        </div>
        
        <div class="form-group">
            <label for="status">Statut :</label>
            <span>Actuel : {{ $payment->status }}</span>
            <select name="status" id="status">
                <option selected disabled value="">Laisser vide si non modifié</option>
                <option value="pending">Pending</option>
                <option value="paid">Paid</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="date">Date :</label>
            <span>Actuel : {{ $payment->date }}</span>
            <input type="text" name="date" id="date" placeholder="Laisser vide si non modifié">
        </div>

        <button type="submit" class="btn">Mettre à jour</button>
    </form>
</div>
@endsection

<script>
    const dateInput = document.getElementById('date');
    dateInput.addEventListener("click", () => {
        dateInput.setAttribute('type', 'date');
    })
</script>

