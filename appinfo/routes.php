<?php

return [
    'routes' => [
        ['name' => 'tool#index', 'url' => '/', 'verb' => 'GET'],
        ['name' => 'tool#add', 'url' => '/add', 'verb' => 'GET'],
        ['name' => 'tool#save', 'url' => '/save', 'verb' => 'POST', 'postfix' => 'csrf'],
		['name' => 'tool#edit', 'url' => '/edit/{id}', 'verb' => 'GET'],
		['name' => 'tool#update', 'url' => '/update', 'verb' => 'POST', 'postfix' => 'csrf'],
		['name' => 'tool#delete', 'url' => '/delete/{id}', 'verb' => 'POST', 'postfix' => 'csrf'],
		['name' => 'tool#confirmDelete', 'url' => '/delete/confirm/{id}', 'verb' => 'GET'],
		['name' => 'tool#scan', 'url' => '/scan', 'verb' => 'GET'],
		['name' => 'tool#updateStatus', 'url' => '/updateStatus/{id}', 'verb' => 'POST', 'postfix' => 'csrf'],

        // Ajoutez d'autres routes au besoin
    ]
];
