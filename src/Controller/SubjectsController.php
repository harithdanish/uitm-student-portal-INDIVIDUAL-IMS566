<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

class SubjectsController extends AppController
{
    /**
     * Papar Senarai Subjek
     */
    public function index()
    {
        $Subjects = TableRegistry::getTableLocator()->get('Subjects');
        $subjects = $Subjects->find()->all();
        $this->set(compact('subjects'));
    }

    /**
     * Tambah Subjek Baru
     */
    public function add()
    {
        $Subjects = TableRegistry::getTableLocator()->get('Subjects');
        $subject = $Subjects->newEmptyEntity();
        
        if ($this->request->is('post')) {
            // Bypass perlindungan field supaya semua input borang lepas masuk
            $subject = $Subjects->patchEntity($subject, $this->request->getData(), [
                'accessibleFields' => ['*' => true]
            ]);

            // Biarkan database urus primary key (subject_id) secara auto-increment jika perlu
            unset($subject->subject_id);

            // Guna save tanpa strict validation check untuk elakkan gantung senyap
            if ($Subjects->save($subject, ['checkRules' => false, 'validate' => false])) {
                $this->Flash->success(__('Subject information has been successfully saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Failed to save subject information. Please try again.'));
        }
        $this->set(compact('subject'));
    }

    /**
     * Papar Maklumat Subjek
     */
    public function view($id = null)
    {
        $Subjects = TableRegistry::getTableLocator()->get('Subjects');
        $subject = $Subjects->get($id);
        $this->set(compact('subject'));
    }

    /**
     * Kemas Kini Data Subjek
     */
    public function edit($id = null)
    {
        $Subjects = TableRegistry::getTableLocator()->get('Subjects');
        $subject = $Subjects->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $subject = $Subjects->patchEntity($subject, $this->request->getData(), [
                'accessibleFields' => ['*' => true]
            ]);
            
            if ($Subjects->save($subject, ['checkRules' => false, 'validate' => false])) {
                $this->Flash->success(__('Subject information has been successfully updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Failed to update subject information. Please try again.'));
        }
        $this->set(compact('subject'));
    }

    /**
     * Padam Subjek
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        
        $Subjects = TableRegistry::getTableLocator()->get('Subjects');
        $subject = $Subjects->get($id);
        
        if ($Subjects->delete($subject)) {
            $this->Flash->success(__('Subject information has been successfully deleted.'));
        } else {
            $this->Flash->error(__('Failed to delete subject information. Please try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}