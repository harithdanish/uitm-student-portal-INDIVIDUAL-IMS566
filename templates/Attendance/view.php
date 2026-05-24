<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attendance $attendanceEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Attendance'), ['action' => 'edit', $attendanceEntity->attendance_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Attendance'), ['action' => 'delete', $attendanceEntity->attendance_id], ['confirm' => __('Are you sure you want to delete # {0}?', $attendanceEntity->attendance_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Attendance'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Attendance'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="attendance view content">
            <h3><?= h($attendanceEntity->attendance_status) ?></h3>
            <table>
                <tr>
                    <th><?= __('Attendance Status') ?></th>
                    <td><?= h($attendanceEntity->attendance_status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Student') ?></th>
                    <td><?= $attendanceEntity->hasValue('student') ? $this->Html->link($attendanceEntity->student->student_number, ['controller' => 'Students', 'action' => 'view', $attendanceEntity->student->student_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Subject') ?></th>
                    <td><?= $attendanceEntity->hasValue('subject') ? $this->Html->link($attendanceEntity->subject->subject_code, ['controller' => 'Subjects', 'action' => 'view', $attendanceEntity->subject->subject_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Attendance Id') ?></th>
                    <td><?= $this->Number->format($attendanceEntity->attendance_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Attendance Percentage') ?></th>
                    <td><?= $this->Number->format($attendanceEntity->attendance_percentage) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>