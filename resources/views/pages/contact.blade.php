@extends(Auth::check() ? 'layouts.app': 'layouts.guest')

@section('title', 'Contact')

@section('content')
    <h1>Contact</h1>

    <div class="form-container">
        <form>
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" name="name">
            </div>

            <div class="form-group">
                <label for="email">Email :</label>
                <input type="text" name="email">
            </div>

            <div class="form-group">
                <label for="subject">Sujet :</label>
                <input type="text" name="subject">
            </div>

            <div class="form-group">
                <label for="message">Message :</label>
                <textarea name="message" cols="30" rows="10"></textarea>
            </div>

            <button type="submit">Envoyer</button>
        </form>
    </div>
@endsection