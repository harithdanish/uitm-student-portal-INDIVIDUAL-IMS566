<?php
declare(strict_types=1);
namespace App\Controller;

class AssignmentsController extends AppController {
    
    public function index()
{
    $assignments = $this->Assignments->find('all')
        ->contain(['Students', 'Subjects']) // Pastikan ia memanggil relation yang betul
        ->toArray();
    $this->set(compact('assignments'));
}

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $assignment = $this->Assignments->get($id);
        if ($this->Assignments->delete($assignment)) {
            $this->Flash->success(__('Assignment deleted successfully.'));
        } else {
            $this->Flash->error(__('Failed to delete assignment.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function deleteAll()
    {
        $this->request->allowMethod(['post', 'delete']);
        if ($this->Assignments->deleteAll(['1 = 1'])) {
            $this->Flash->success(__('All assignments cleared.'));
        } else {
            $this->Flash->error(__('Failed to clear assignments.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    // Ensure your updateStatus method in AssignmentsController.php is ready to receive the array
public function updateStatus() 
{
    $this->request->allowMethod(['post']);
    $statusData = $this->request->getData('status');
    
    if (!empty($statusData) && is_array($statusData)) {
        foreach ($statusData as $id => $status) {
            $assignment = $this->Assignments->get($id);
            $assignment->submission_status = $status;
            $this->Assignments->save($assignment);
        }
        $this->Flash->success(__('Assignment statuses updated successfully.'));
    } else {
        $this->Flash->error(__('No changes detected.'));
    }
    return $this->redirect(['action' => 'index']);
}

public function assignToStudents($subject_id = null)
{
    if ($this->request->is('post')) {
        $data = $this->request->getData();
        $studentIds = $data['student_ids'] ?? []; // Ambil semua ID pelajar yang di-tick

        if (empty($studentIds)) {
            $this->Flash->error(__('Sila pilih sekurang-kurangnya seorang pelajar.'));
        } else {
            $successCount = 0;
            foreach ($studentIds as $sId) {
                // Cipta entiti baru untuk SETIAP pelajar
                $assignment = $this->Assignments->newEmptyEntity();
                $assignment->assignment_title = $data['assignment_title'];
                $assignment->due_date = $data['due_date'];
                $assignment->subject_id = $subject_id;
                $assignment->student_id = $sId; // Masukkan ID pelajar
                $assignment->submission_status = 'Pending'; // Set status awal

                if ($this->Assignments->save($assignment)) {
                    $successCount++;
                }
            }
            
            if ($successCount > 0) {
                $this->Flash->success(__($successCount . ' tugasan berjaya diberikan.'));
                return $this->redirect(['controller' => 'Subjects', 'action' => 'index']);
            }
        }
    }

    $students = $this->Assignments->Students->find('list', [
        'keyField' => 'student_id',
        'valueField' => 'full_name'
    ]);
    
    $assignment = $this->Assignments->newEmptyEntity();
    $this->set(compact('assignment', 'students'));
}

public function add()
{
    $assignment = $this->Assignments->newEmptyEntity();

    if ($this->request->is('post')) {

        $assignment = $this->Assignments->patchEntity(
            $assignment,
            $this->request->getData()
        );

        $assignment->submission_status = 'PENDING';

        if ($this->Assignments->save($assignment)) {

            $this->Flash->success(__('Assignment added successfully.'));

            return $this->redirect(['action' => 'index']);

        }

        $this->Flash->error(__('Failed to add assignment.'));
    }

    $students = $this->Assignments->Students
        ->find('list')
        ->all();

    $this->set(compact('assignment', 'students'));
}
}