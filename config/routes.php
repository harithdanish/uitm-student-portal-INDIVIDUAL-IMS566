<?php
declare(strict_types=1);

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void
{
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {

        $builder->connect('/', [
            'controller' => 'Pages',
            'action' => 'home'
        ]);

        $builder->connect('/login', [
            'controller' => 'Students',
            'action' => 'login'
        ]);

        $builder->connect('/register', [
            'controller' => 'Students',
            'action' => 'register'
        ]);

        $builder->connect('/dashboard', [
            'controller' => 'Pages',
            'action' => 'dashboard'
        ]);

        $builder->connect('/logout', [
            'controller' => 'Students',
            'action' => 'logout'
        ]);

        $builder->connect('/students', [
            'controller' => 'Students',
            'action' => 'index'
        ]);

        $builder->connect('/subjects', [
            'controller' => 'Subjects',
            'action' => 'index'
        ]);

        $builder->connect('/assignments', [
            'controller' => 'Assignments',
            'action' => 'index'
        ]);

        $builder->connect('/attendance', [
            'controller' => 'Attendance',
            'action' => 'index'
        ]);

        $builder->connect('/pages/*', 'Pages::display');

        $builder->fallbacks();
    });
};