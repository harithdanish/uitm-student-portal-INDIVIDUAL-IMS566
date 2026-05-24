<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

class StudentsController extends AppController
{
    public function index()
    {
        $Students = $this->fetchTable('Students');
        $students = $Students->find()->all();

        $this->set(compact('students'));
    }

    public function add()
    {
        $Students = $this->fetchTable('Students');
        $student = $Students->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $data['password'] = password_hash('123456', PASSWORD_DEFAULT);

            $student = $Students->patchEntity($student, $data, [
                'accessibleFields' => ['*' => true]
            ]);

            unset($student->student_id);

            if ($Students->save($student, ['checkRules' => false, 'validate' => false])) {
                $this->Flash->success(__('Student information has been successfully saved.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Failed to save student information. Please try again.'));
        }

        $this->set(compact('student'));
    }

    public function edit($id = null)
    {
        $Students = $this->fetchTable('Students');
        $student = $Students->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $Students->patchEntity($student, $this->request->getData(), [
                'accessibleFields' => ['*' => true]
            ]);

            if ($Students->save($student, ['checkRules' => false, 'validate' => false])) {
                $this->Flash->success(__('Student information has been successfully updated.'));
                return $this->redirect(['action' => 'view', $id]);
            }

            $this->Flash->error(__('Failed to update student information. Please try again.'));
        }

        $this->set(compact('student'));
    }

    public function view($id = null)
    {
        $Students = $this->fetchTable('Students');
        $student = $Students->get($id);

        $this->set(compact('student'));
        $this->set('backUrl', $this->request->referer());
    }

    public function delete($id = null)
{
    $this->request->allowMethod(['post', 'delete']);

    $Students = $this->fetchTable('Students');
    $student = $Students->get($id);

    // Delete related attendance records first
    $Attendance = $this->fetchTable('Attendance');
    $Attendance->deleteAll(['student_id' => $id]);

    // Delete related assignments records first
    $Assignments = $this->fetchTable('Assignments');
    $Assignments->deleteAll(['student_id' => $id]);

    // Then delete student
    if ($Students->delete($student)) {
        $this->Flash->success(__('The student has been deleted.'));
    } else {
        $this->Flash->error(__('The student could not be deleted.'));
    }

    return $this->redirect(['action' => 'index']);
}

    public function login()
    {
        $session = $this->request->getSession();

        if ($session->check('Student')) {
            return $this->redirect('/dashboard');
        }

        if ($this->request->is('post')) {
            $loginInput = trim((string)$this->request->getData('student_number'));
            $password = trim((string)$this->request->getData('password'));

            $Students = $this->fetchTable('Students');

            $student = $Students->find()
                ->where([
                    'OR' => [
                        'Students.student_number' => $loginInput,
                        'Students.email' => $loginInput
                    ]
                ])
                ->first();

            if (!$student) {
                $this->Flash->error('Student ID or email not found.');
                return $this->redirect('/login');
            }

            $passwordInDb = (string)$student->password;

            $validPassword = password_verify($password, $passwordInDb) || $password === $passwordInDb;

            if (!$validPassword) {
                $this->Flash->error('Wrong password.');
                return $this->redirect('/login');
            }

            $session->write('Student', [
                'student_id' => $student->student_id,
                'student_number' => $student->student_number,
                'full_name' => $student->full_name,
                'email' => $student->email
            ]);

            $this->Flash->success('Login successful.');

            return $this->redirect('/dashboard');
        }
    }

    public function register()
    {
        $Students = $this->fetchTable('Students');
        $student = $Students->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            if (($data['password'] ?? '') !== ($data['confirm_password'] ?? '')) {
                $this->Flash->error(__('Password and confirm password do not match.'));
                $this->set(compact('student'));
                return;
            }

            unset($data['confirm_password']);

            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            $student = $Students->patchEntity($student, $data, [
                'accessibleFields' => ['*' => true]
            ]);

            unset($student->student_id);

            if ($Students->save($student, ['checkRules' => false, 'validate' => false])) {
                $this->Flash->success(__('Registration successful. Please login.'));
                return $this->redirect('/login');
            }

            $this->Flash->error(__('Registration failed. Please check your details.'));
        }

        $this->set(compact('student'));
    }

    public function logout()
{
    $this->request->getSession()->delete('Student');

    $this->Flash->success(__('You have been logged out.'));

    return $this->redirect([
        'controller' => 'Pages',
        'action' => 'home'
    ]);
}
}