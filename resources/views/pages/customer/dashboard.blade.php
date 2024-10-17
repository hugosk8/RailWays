@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    @if (session('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
    @elseif (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif
    
    <h1>Dashboard</h1>
    <p>Vous êtes connecté !</p>
    <ul>
        <li>Nom : {{ $user->name}}</li>
        <li>Role : {{ $user->role}}</li>
        <li>Email : {{ $user->email }}</li>
    </ul>

    <div class="appointments">
        <h2>Mes rendez-vous</h2>
        <div class="cards-container">

            @if ($appointments->isEmpty())
                <p>Aucun rendez-vous programmé</p>
            @else
                @foreach ($appointments as $appointment)
                    <div class="card">
                        <h3>{{ $appointment->service->name }}</h3>
                        <span>Date : {{ $appointment->date }}</span>
                        <button type="button" class="btn-delete" onclick="confirmDelete({{$appointment->id}})">Annuler</button>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    {{-- Modale de confirmation --}}
    <div id="deleteModal">
        <div class="modal-content">
            <p>Voulez vous annuler ce rendez-vous?</p>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-confirm" >Confirmer</button>
                <button type="button" class="btn-cancel" onclick="closeModal()">Annuler</button>
            </form>
        </div>
    </div>
</div>
@endsection

<script>
    function confirmDelete($appointmentId) {
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = `/appointments/${$appointmentId}`;

        document.getElementById('deleteModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('deleteModal').style.display = 'none';
    }
</script>
