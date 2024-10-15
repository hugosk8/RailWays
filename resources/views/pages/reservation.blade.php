@extends(auth()->check() && auth()->user()->role === 'admin' ? 'layouts.admin' : (auth()->check() ? 'layouts.app' : 'layouts.guest'))

@section('title', 'Reservation')

@section('content')
<div class="container">
    <h1>Reservation</h1>

    <div class="reservation-container">
        <div class="service">
            <h1>1. Choix de la prestation</h1>
            <select name="service" id="service" required>
                <option selected disabled value="">Choix de la prestation</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="date">

        </div>
    </div>
</div>
@endsection