<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attendance $attendanceEntity
 * @var string[]|\Cake\Collection\CollectionInterface $students
 * @var string[]|\Cake\Collection\CollectionInterface $subjects
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $attendanceEntity->attendance_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $attendanceEntity->attendance_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Attendance'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="attendance form content">
            <?= $this->Form->create($attendanceEntity) ?>
            <fieldset>
                <legend><?= __('Edit Attendance') ?></legend>
                <?php
                    echo $this->Form->control('attendance_percentage');
                    echo $this->Form->control('attendance_status');
                    echo $this->Form->control('student_id', ['options' => $students, 'empty' => true]);
                    echo $this->Form->control('subject_id', ['options' => $subjects, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
