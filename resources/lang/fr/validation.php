<?php

return [
    'accepted' => 'Le champ :attribute doit être accepté.',
    'active_url' => 'Le champ :attribute n\'est pas une URL valide.',
    'after' => 'Le champ :attribute doit être une date postérieure à :date.',
    'alpha' => 'Le champ :attribute ne peut contenir que des lettres.',
    'email' => 'Le champ :attribute doit être une adresse email valide.',
    'required' => 'Le champ :attribute est obligatoire.',
    'min' => [
        'string' => 'Le champ :attribute doit contenir au moins :min caractères.',
    ],
    'custom' => [
        'email' => [
            'required' => 'L\'email est obligatoire.',
            'email' => 'Le format de l\'email est invalide.',
        ],
        'password' => [
            'required' => 'Le mot de passe est obligatoire.',
            'min' => 'Le mot de passe doit contenir au moins :min caractères.',
        ],
    ],
    'attributes' => [
        'email' => 'adresse email',
        'password' => 'mot de passe',
    ],
];
