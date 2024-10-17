@extends(auth()->check() && auth()->user()->role === 'admin' ? 'layouts.admin' : (auth()->check() ? 'layouts.app' : 'layouts.guest'))

@section('title', 'Reservation')

@section('content')
<div class="container">
    <h1>Réserver une prestation</h1>
    
    <form {{--  action="{{ route('reservation.store') }}" --}} method="POST">
        @csrf

        <!-- Sélection de la prestation -->
        <div class="service">
            <label for="service">Choisir une prestation</label>
            <select id="service" name="service_id" required>
                <option selected disabled value="">Choisissez votre prestation</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }} ({{ $service->duration }} heures)</option>
                @endforeach
            </select>
        </div>

        <!-- Sélection de la date et l'heure -->
        <div>
            <label for="appointment_date_time">Choisir une date et une heure :</label>
            <input type="text" style="display: none" id="appointment_date_time" name="appointment_date_time">
        </div>

        <button type="submit">Réserver</button>
    </form>
</div>
@endsection

@vite(['resources/js/flat-picker.js'])