<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attendance $attendanceEntity
 * @var \Cake\Collection\CollectionInterface|string[] $students
 * @var \Cake\Collection\CollectionInterface|string[] $subjects
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Attendance'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="attendance form content">
            <?= $this->Form->create($attendanceEntity) ?>
            <fieldset>
                <legend><?= __('Add Attendance') ?></legend>
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
