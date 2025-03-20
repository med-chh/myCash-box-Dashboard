<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use App\Models\Team;


// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'), ['icon' => 'dashboard-']);
});


// Dashboard > Team (Ensure Model Instance is Passed)
Breadcrumbs::for('teams.show', function (BreadcrumbTrail $trail, Team $team) {
    $trail->parent('dashboard');
    $trail->push($team->name, route('teams.show', $team->id)); // Pass ID to the route
});

// Dashboard > Settings
Breadcrumbs::for('settings', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Settings', route('settings'),['icon' => 'settings']);
});

// Dashboard > Settings > Profile
Breadcrumbs::for('profiles', function (BreadcrumbTrail $trail) {
    $trail->parent('settings');
    $trail->push('Profile', route('profiles'));
});

// Categories List
Breadcrumbs::for('categories.index', function (BreadcrumbTrail $trail) {
    $trail->push('Categories', route('categories.index'));
});

// Subscribe breadcrumb
Breadcrumbs::for('subscribe', function ($trail) {
    $trail->parent('dashboard'); // Makes Home the parent breadcrumb
    $trail->push('Subscribe', route('subscribe')); // Adds the current "Subscribe" page
});
