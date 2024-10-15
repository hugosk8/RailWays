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

    <h1>Liste des utilisateurs</h1>

    <a class="btn" href="{{ route('admin.users.create') }}">Ajouter</a>

    @if ($users->isEmpty())
        <p>Aucun utilisateur n'a été trouvé.</p>
    @else
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nom</td>
                    <td>Role</td>
                    <td>Email</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        <a href="{{ route('admin.users.show', $user->id) }}">
                            {{ $user->name }}
                        </a>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td class="action-buttons">
                        <button type="button" class="btn-delete" onclick="confirmDelete({{$user->id}})">Supprimer</button>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn-modify">Modifier</a>
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
</div>
@endsection

<script>
    function confirmDelete(userId) {
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = `users/${userId}`;

        document.getElementById('deleteModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('deleteModal').style.display = 'none';
    }
</script>
