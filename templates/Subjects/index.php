<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="font-weight-bold">SUBJECTS</h2>
    <?= $this->Html->link(__(' + ADD NEW SUBJECT'), ['action' => 'add'], ['class' => 'btn btn-primary font-weight-bold shadow-sm']) ?>
</div>

<div class="card shadow-sm border-0" style="border-radius: 12px; overflow: hidden;">
    <div class="card-body p-0">
        <table class="table table-hover align-middle m-0">
            <thead class="bg-light">
                <tr>
                    <th class="pl-4 py-3">NO.</th>
                    <th class="py-3">SUBJECT CODE</th>
                    <th class="py-3">SUBJECT NAME</th>
                    <th class="py-3">LECTURER</th>
                    <th class="text-center py-3">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($subjects)): ?>
                    <?php $no = 1; foreach ($subjects as $subject): ?>
                        <tr>
                            <td class="pl-4 font-weight-bold"><?= $no++ ?></td>
                            <td><?= h($subject->subject_code) ?></td>
                            <td class="font-weight-bold"><?= h($subject->subject_name) ?></td>
                            <td><?= h($subject->lecturer_name) ?></td>
                            <td class="text-center">
                               <?= $this->Html->link(__('<i class="fas fa-eye"></i>'), ['action' => 'view', $subject->subject_id], ['class' => 'btn btn-sm btn-outline-info mr-1', 'escape' => false, 'title' => 'View']) ?>
                                        <?= $this->Html->link(__('<i class="fas fa-edit"></i>'), ['action' => 'edit', $subject->subject_id], ['class' => 'btn btn-sm btn-outline-warning mr-1', 'escape' => false, 'title' => 'Edit']) ?>
                                        <?= $this->Form->postLink(__('<i class="fas fa-trash-alt"></i>'), ['action' => 'delete', $subject->subject_id], ['confirm' => __('Are you sure?'), 'class' => 'btn btn-sm btn-outline-danger mr-1', 'escape' => false, 'title' => 'Delete']) ?>
                                        <?= $this->Html->link(__('<i class="fas fa-user-plus"></i>'), ['controller' => 'Assignments', 'action' => 'assignToStudents', $subject->subject_id], ['class' => 'btn btn-sm btn-outline-success', 'escape' => false, 'title' => 'Assign']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">No subjects found in database.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>