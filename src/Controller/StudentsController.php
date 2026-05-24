<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

class StudentsController extends AppController
{
    /**
     * Papar Senarai Pelajar
     */
    public function index()
    {
        $Students = TableRegistry::getTableLocator()->get('Students');
        $students = $Students->find()->all();
        $this->set(compact('students'));
    }

    /**
     * Tambah Pelajar Baru
     */
    public function add()
    {
        $Students = TableRegistry::getTableLocator()->get('Students');
        $student = $Students->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            
            // Masukkan password default secara automatik ke dalam data borang
            $data['password'] = password_hash('123456', PASSWORD_DEFAULT);

            $student = $Students->patchEntity($student, $data, [
                'accessibleFields' => ['*' => true]
            ]);

            // Biarkan database urus student_id secara auto-increment
            unset($student->student_id);

            if ($Students->save($student, ['checkRules' => false, 'validate' => false])) {
                $this->Flash->success(__('Student information has been successfully saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Failed to save student information. Please try again.'));
        }
        $this->set(compact('student'));
    }

    /**
     * Kemas Kini Data Pelajar (FIX ERROR STDCLASS)
     */
    public function edit($id = null)
{
    $Students = TableRegistry::getTableLocator()->get('Students');
    $student = $Students->get($id);

    if ($this->request->is(['patch', 'post', 'put'])) {
        $student = $Students->patchEntity($student, $this->request->getData(), [
            'accessibleFields' => ['*' => true]
        ]);
        
        if ($Students->save($student, ['checkRules' => false, 'validate' => false])) {
            $this->Flash->success(__('Student information has been successfully updated.'));
            
            // LOGIK PINTAR: Lepas save, balik ke VIEW, bukan ke INDEX
            return $this->redirect(['action' => 'view', $id]);
        }
        $this->Flash->error(__('Failed to update student information. Please try again.'));
    }
    
    // Simpan lokasi asal (referer) dalam session sebelum user mula edit
    if (!$this->request->getSession()->check('last_page')) {
        $this->request->getSession()->write('last_page', $this->request->referer());
    }

    $this->set(compact('student'));
}

    /**
     * Papar Maklumat Pelajar
     */
    public function view($id = null) {
    $student = $this->Students->get($id);
    $this->set(compact('student'));
    
    // Pastikan kita "catch" kat mana user datang
    $this->set('backUrl', $this->request->referer()); 
}

    /**
     * Padam Pelajar
     */
    public function delete($id = null)
{
    $this->request->allowMethod(['post', 'delete']);
    $student = $this->Students->get($id);

    // Dapatkan akses ke table Assignments
    $assignmentsTable = TableRegistry::getTableLocator()->get('Assignments');
    
    // Padam semua assignments untuk pelajar ini dahulu
    $assignmentsTable->deleteAll(['student_id' => $id]);

    // Sekarang baru padam pelajar
    if ($this->Students->delete($student)) {
        $this->Flash->success(__('The student has been deleted.'));
    } else {
        $this->Flash->error(__('The student could not be deleted.'));
    }
    return $this->redirect(['action' => 'index']);
}

    public function login()
    {
    }
}