@extends(auth()->check() && auth()->user()->role === 'admin' ? 'layouts.admin' : (auth()->check() ? 'layouts.app' : 'layouts.guest'))

@section('title', 'Nos prestations')

@section('content')
<div class="container">
    <h1>Nos Prestations</h1>

    <div class="services-container">
        @foreach ($services as $service)
        <div class="card">
            <div class="content">
                <h2>{{ $service->name }}</h2>
                <span>{{ $service->duration }} heures</span>
                <p>{{ $service->description }}</p>
                <span>{{ $service->price }} €</span>
            </div>
            <a class="cta" href="{{ route('reservation') }}">Prendre rendez-vous</a>
        </div>
        @endforeach
    </div>
</div>
@endsection