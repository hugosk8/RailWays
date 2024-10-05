@extends(Auth::check() ? 'layouts.app': 'layouts.guest')

@section('title', 'Accueil Guest')

@section('content')
    <h1>Accueil</h1>
@endsection