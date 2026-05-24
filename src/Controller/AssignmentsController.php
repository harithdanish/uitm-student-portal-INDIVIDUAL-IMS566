<?php
declare(strict_types=1);

namespace App\Controller;

class AssignmentsController extends AppController
{
    public function index()
    {
        $Assignments = $this->fetchTable('Assignments');

        $assignments = $Assignments->find()
            ->contain(['Students', 'Subjects'])
            ->all();

        $this->set(compact('assignments'));
    }

    public function add()
    {
        $Assignments = $this->fetchTable('Assignments');

        $assignment = $Assignments->newEmptyEntity();

        if ($this->request->is('post')) {

            $assignment = $Assignments->patchEntity(
                $assignment,
                $this->request->getData(),
                [
                    'accessibleFields' => ['*' => true]
                ]
            );

            $assignment->submission_status = 'Pending';

            if ($Assignments->save($assignment, ['checkRules' => false, 'validate' => false])) {
                $this->Flash->success(__('Assignment added successfully.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Failed to add assignment.'));
        }

        $students = $Assignments->Students
            ->find('list', [
                'keyField' => 'student_id',
                'valueField' => 'full_name'
            ])
            ->all();

        $subjects = $Assignments->Subjects
            ->find('list', [
                'keyField' => 'subject_id',
                'valueField' => 'subject_name'
            ])
            ->all();

        $this->set(compact('assignment', 'students', 'subjects'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $Assignments = $this->fetchTable('Assignments');

        $assignment = $Assignments->get($id);

        if ($Assignments->delete($assignment)) {
            $this->Flash->success(__('The assignment has been deleted.'));
        } else {
            $this->Flash->error(__('The assignment could not be deleted.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function deleteAll()
    {
        $this->request->allowMethod(['post', 'delete']);

        $Assignments = $this->fetchTable('Assignments');

        $Assignments->deleteAll(['1 = 1']);

        $this->Flash->success(__('All assignments cleared.'));

        return $this->redirect(['action' => 'index']);
    }

    public function updateStatus()
    {
        $this->request->allowMethod(['post']);

        $Assignments = $this->fetchTable('Assignments');

        $assignmentId = $this->request->getData('assignment_id');
        $status = $this->request->getData('submission_status');

        if (empty($assignmentId) || empty($status)) {
            $this->Flash->error(__('No changes detected.'));
            return $this->redirect(['action' => 'index']);
        }

        $assignment = $Assignments->get($assignmentId);

        $assignment->submission_status = $status;

        if ($Assignments->save($assignment, ['checkRules' => false, 'validate' => false])) {
            $this->Flash->success(__('Assignment status updated successfully.'));
        } else {
            $this->Flash->error(__('Failed to update assignment status.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function assignToStudents($subject_id = null)
    {
        $Assignments = $this->fetchTable('Assignments');

        if ($this->request->is('post')) {

            $data = $this->request->getData();

            $studentIds = $data['student_ids'] ?? [];

            if (empty($studentIds)) {

                $this->Flash->error(__('Sila pilih sekurang-kurangnya seorang pelajar.'));

            } else {

                $successCount = 0;

                foreach ($studentIds as $studentId) {

                    $assignment = $Assignments->newEmptyEntity();

                    $assignment->assignment_title = $data['assignment_title'];
                    $assignment->due_date = $data['due_date'];
                    $assignment->subject_id = $subject_id;
                    $assignment->student_id = $studentId;
                    $assignment->submission_status = 'Pending';

                    if ($Assignments->save($assignment, ['checkRules' => false, 'validate' => false])) {
                        $successCount++;
                    }
                }

                if ($successCount > 0) {
                    $this->Flash->success(__($successCount . ' tugasan berjaya diberikan.'));

                    return $this->redirect([
                        'controller' => 'Subjects',
                        'action' => 'index'
                    ]);
                }
            }
        }

        $students = $Assignments->Students
            ->find('list', [
                'keyField' => 'student_id',
                'valueField' => 'full_name'
            ])
            ->all();

        $assignment = $Assignments->newEmptyEntity();

        $this->set(compact('assignment', 'students'));
    }
}