<?php

use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Spatie\Permission\Models\Role;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard'));
});

// Home > Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Dashboard', route('dashboard'));
});

// Home > Dashboard > User Management
Breadcrumbs::for('admin.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('User Management', route('admin.users.index'));
});

// Home > Dashboard > User Management > Users
Breadcrumbs::for('admin.users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Users', route('admin.users.index'));
});

// Home > Dashboard > User Management > Users > [User]
Breadcrumbs::for('admin.users.show', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('admin.users.index');
    $trail->push(ucwords($user->name), route('admin.users.show', $user));
});

// Home > Dashboard > User Management > Roles
Breadcrumbs::for('admin.roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Roles', route('admin.roles.index'));
});

// Home > Dashboard > User Management > Roles > [Role]
Breadcrumbs::for('admin.roles.show', function (BreadcrumbTrail $trail, Role $role) {
    $trail->parent('admin.roles.index');
    $trail->push(ucwords($role->name), route('admin.roles.show', $role));
});

// Home > Dashboard > User Management > Permission
Breadcrumbs::for('admin.permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Permissions', route('admin.permissions.index'));
});
