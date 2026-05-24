<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="m-0 font-weight-bold">ASSIGNMENTS LIST</h1>

    <?= $this->Html->link(
        __('BACK TO SUBJECTS'),
        ['controller' => 'Subjects', 'action' => 'index'],
        ['class' => 'btn btn-outline-secondary font-weight-bold']
    ) ?>
</div>

<div class="card shadow-sm border-0" style="border-radius: 12px; overflow: hidden;">
    <div class="card-body p-0">

        <table class="table table-hover align-middle m-0">
            <thead class="bg-light text-dark">
                <tr>
                    <th class="pl-4 py-3">TITLE</th>
                    <th class="py-3">STUDENT NAME</th>
                    <th class="py-3">STUDENT ID</th>
                    <th class="py-3">DUE DATE</th>
                    <th class="py-3">STATUS</th>
                    <th class="text-center py-3">ACTION</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($assignments)): ?>

                    <?php foreach ($assignments as $a): ?>

                        <tr>
                            <td class="pl-4 font-weight-bold">
                                <?= h($a->assignment_title) ?>
                            </td>

                            <td>
                                <?= $a->hasValue('student') ? h($a->student->full_name) : '<span class="text-muted">N/A</span>' ?>
                            </td>

                            <td>
                                <?= $a->hasValue('student') ? h($a->student->student_number) : '-' ?>
                            </td>

                            <td>
                                <?= h($a->due_date) ?>
                            </td>

                            <td>
                                <?php
                                    $status = $a->submission_status ?? 'Pending';
                                    $color = ($status === 'Submitted') ? 'badge-success' : 'badge-warning';
                                ?>

                                <span class="badge <?= $color ?> p-2" style="color: inherit;">
                                    <?= h($status) ?>
                                </span>

                                <?= $this->Form->create(null, [
                                    'url' => ['action' => 'updateStatus'],
                                    'class' => 'mt-2'
                                ]) ?>

                                    <?= $this->Form->hidden('assignment_id', [
                                        'value' => $a->assignment_id
                                    ]) ?>

                                    <?= $this->Form->select(
                                        'submission_status',
                                        [
                                            'Pending' => 'Pending',
                                            'Submitted' => 'Submitted'
                                        ],
                                        [
                                            'value' => $status,
                                            'class' => 'form-control form-control-sm w-75 d-inline-block'
                                        ]
                                    ) ?>

                                    <?= $this->Form->button('Save', [
                                        'class' => 'btn btn-sm btn-primary ml-1'
                                    ]) ?>

                                <?= $this->Form->end() ?>
                            </td>

                            <td class="text-center">
                                <?= $this->Form->postLink(
                                    __('<i class="fas fa-trash-alt"></i>'),
                                    ['action' => 'delete', $a->assignment_id],
                                    [
                                        'confirm' => __('Are you sure you want to delete this assignment?'),
                                        'class' => 'btn btn-sm btn-outline-danger',
                                        'escape' => false,
                                        'title' => 'Delete'
                                    ]
                                ) ?>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>
                        <td colspan="6" class="text-center text-muted py-5">
                            No assignments found.
                        </td>
                    </tr>

                <?php endif; ?>
            </tbody>
        </table>

    </div>
</div>

<div class="mt-4">
    <?= $this->Form->postLink(
        __('Clear All'),
        ['action' => 'deleteAll'],
        [
            'confirm' => __('Are you sure you want to clear all assignment data?'),
            'class' => 'btn btn-outline-danger font-weight-bold'
        ]
    ) ?>
</div>