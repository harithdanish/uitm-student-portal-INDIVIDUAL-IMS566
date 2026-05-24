<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;

class AppController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $controller = $this->request->getParam('controller');
        $action = $this->request->getParam('action');

        $publicPages = [
            'Students' => ['login', 'register'],
            'Pages' => ['home', 'display'],
        ];

        $isPublicPage = isset($publicPages[$controller]) &&
            in_array($action, $publicPages[$controller]);

        if (!$isPublicPage && !$this->request->getSession()->check('Student')) {
            $this->Flash->error('Please login first.');

            return $this->redirect([
                'controller' => 'Students',
                'action' => 'login'
            ]);
        }
    }
}