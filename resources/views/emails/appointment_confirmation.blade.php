<!DOCTYPE html>
<html>
<head>
    <title>Confirmation de rendez-vous</title>
</head>
<body>
    <h1>Bonjour {{ $appointment->user->name }},</h1>
    <p>Merci d'avoir pris rendez-vous avec nous. Voici les détails de votre rendez-vous :</p>

    <p><strong>Service :</strong> {{ $appointment->service->name }}</p>
    <p><strong>Date :</strong> {{ $appointment->date->format('d/m/Y') }} à 10h</p>

    <p>Nous avons hâte de vous voir !</p>
</body>
</html>
