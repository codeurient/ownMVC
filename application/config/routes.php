<?php

return [
    // этот URL (public_html) будет использовать 'controller' => 'main'
    'public_html' => [
        'controller' => 'main',
        'action' => 'index',
    ],
    // этот URL (public_html/account/login) будет использовать 'controller' => 'main'
    'public_html/account/login' => [
        'controller' => 'account',
        'action' => 'login',
    ],
    // этот URL (public_html/account/register) будет использовать 'controller' => 'main'
    'public_html/account/register' => [
        'controller' => 'account',
        'action' => 'register',
    ],
];