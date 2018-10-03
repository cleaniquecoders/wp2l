<?php

return [
    'domain'                  => env('WP2L_DOMAIN'),
    'default_author_name'     => env('WP2L_DEFAULT_AUTHOR_NAME'),
    'default_author_email'    => env('WP2L_DEFAULT_AUTHOR_EMAIL'),
    'default_author_password' => 'secret',
    'types'                   => ['posts', 'pages', 'categories', 'comments', 'tags', 'media'],
];
