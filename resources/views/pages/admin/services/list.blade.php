@extends('layouts.admin')

@section('title', 'Liste des utilisateurs')

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

    <h1>Liste des services</h1>

    <a class="btn" href="{{ route('admin.services.create') }}">Ajouter</a>

    @if ($services->isEmpty())
        <p>Aucun service n'a été trouvé.</p>
    @else
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nom</td>
                    <td>Prix</td>
                    <td>Durée</td>
                    <td>description</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>
                        <a href="{{ route('admin.services.show', $service->id) }}">
                            {{ $service->name }}
                        </a>
                    </td>
                    <td>{{ $service->price }} €</td>
                    <td>{{ $service->duration }}h</td>
                    <td>{{ $service->description }}</td>
                    <td class="action-buttons">
                        <button type="button" class="btn-delete" onclick="confirmDelete({{$service->id}})">Supprimer</button>
                        <a href="{{ route('admin.services.edit', $service->id) }}" class="btn-modify">Modifier</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Modale de confirmation --}}
        <div id="deleteModal">
            <div class="modal-content">
                <p>Voulez vous supprimer ce service?</p>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-confirm" >Confirmer</button>
                    <button type="button" class="btn-cancel" onclick="closeModal()">Annuler</button>
                </form>
            </div>
        </div>
    @endif
</div>
@endsection

<script>
    function confirmDelete($serviceId) {
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = `services/${$serviceId}`;

        document.getElementById('deleteModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('deleteModal').style.display = 'none';
    }
</script>
