<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

class PagesController extends AppController
{
    public function display(...$path)
    {
        $this->viewBuilder()->setLayout('default');

        if (empty($path)) {
            return $this->redirect('/');
        }

        $this->render(implode('/', $path));
    }

    public function home()
    {
        // Homepage / index page
    }

    public function dashboard()
    {
        $studentSession = $this->request->getSession()->read('Student');

        $Assignments = TableRegistry::getTableLocator()->get('Assignments');

        $totalAssignments = $Assignments->find()->count();

        $submittedAssignments = $Assignments->find()
            ->where(['submission_status' => 'Submitted'])
            ->count();

        $pendingAssignments = $Assignments->find()
            ->where(['submission_status' => 'Pending'])
            ->count();

        $this->set(compact(
            'totalAssignments',
            'submittedAssignments',
            'pendingAssignments',
            'studentSession'
        ));
    }
}