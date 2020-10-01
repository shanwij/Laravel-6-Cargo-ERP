<?php

// Home
Breadcrumbs::for('manage', function ($trail) {
    $trail->push('Manage', route('manage'));
});

// Home > Users
Breadcrumbs::for('users', function ($trail) {
    $trail->parent('manage');
    $trail->push('User', route('users'));
});

