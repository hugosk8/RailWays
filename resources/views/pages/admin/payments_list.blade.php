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

    <h1>Liste des paiements</h1>

    @if ($payments->isEmpty())
        <p>Aucun paiment n'a été trouvé.</p>
    @else
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Client</td>
                    <td>Service</td>
                    <td>Montant</td>
                    <td>Statut</td>
                    <td>Date</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                <tr>
                    <td>
                        <a href="{{ route('admin.payments.show', $payment->id) }}">
                            {{ $payment->id }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.users.show', $payment->appointment->user->id) }}">
                            {{ $payment->appointment->user->name }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.services.show', $payment->appointment->service->id) }}">
                            {{ $payment->appointment->service->name }}
                        </a>
                    </td>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->payment_status }}</td>
                    <td>{{ $payment->payment_date }}</td>
                    <td class="action-buttons">
                        <button type="button" class="btn-delete" onclick="confirmDelete({{$payment->id}})">Supprimer</button>
                        <a href="{{ route('admin.payments.edit', $payment->id) }}" class="btn-modify">Modifier</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Modale de confirmation --}}
        <div id="deleteModal">
            <div class="modal-content">
                <p>Voulez vous supprimer cet utilisateur?</p>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-confirm" >Confirmer</button>
                    <button type="button" class="btn-cancel" onclick="closeModal()">Annuler</button>
                </form>
            </div>
        </div>
    @endif
@endsection

<script>
    function confirmDelete(paymentId) {
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = `payments/${paymentId}`;

        document.getElementById('deleteModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('deleteModal').style.display = 'none';
    }
</script>
