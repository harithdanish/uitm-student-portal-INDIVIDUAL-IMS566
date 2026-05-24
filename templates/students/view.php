<div class="container-fluid py-4">
    <div class="mb-4">
        <h1 class="h3 font-weight-bold">STUDENT DETAILS</h1>
    </div>

    <div class="card shadow-sm border-0" style="border-radius: 12px; overflow: hidden;">
        <div class="card-header bg-dark text-white py-3">
            <h6 class="m-0 font-weight-bold"><i class="fas fa-user-circle mr-2"></i>Profile Information</h6>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <tbody>
                    <tr>
                        <th width="30%" class="py-3 pl-4 text-secondary">STUDENT NUMBER</th>
                        <td class="py-3 font-weight-bold"><?= h($student->student_number ?? $student->student_id) ?></td>
                    </tr>
                    <tr>
                        <th class="py-3 pl-4 text-secondary">IC NUMBER</th>
                        <td class="py-3"><?= h($student->ic_number ?? '040101-01-1234') ?></td>
                    </tr>
                    <tr>
                        <th class="py-3 pl-4 text-secondary">FULL NAME</th>
                        <td class="py-3 text-uppercase font-weight-bold text-primary"><?= h($student->full_name) ?></td>
                    </tr>
                    <tr>
                        <th class="py-3 pl-4 text-secondary">FACULTY</th>
                        <td class="py-3"><?= h($student->faculty) ?></td>
                    </tr>
                    <tr>
                        <th class="py-3 pl-4 text-secondary">COURSE</th>
                        <td class="py-3"><?= h($student->course ?? 'IMS566') ?></td>
                    </tr>
                    <tr>
                        <th class="py-3 pl-4 text-secondary">SEMESTER</th>
                        <td class="py-3"><?= h($student->semester ?? '4') ?></td>
                    </tr>
                    <tr>
                        <th class="py-3 pl-4 text-secondary">EMAIL</th>
                        <td class="py-3"><?= h($student->email ?? 'harith@gmail.com') ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        <?= $this->Html->link(__('<i class="fas fa-arrow-left mr-2"></i>BACK'), ['controller' => 'Students', 'action' => 'index'], ['class' => 'btn btn-outline-secondary font-weight-bold mr-2', 'escape' => false]) ?>
        
        <?= $this->Html->link(__('<i class="fas fa-edit mr-2"></i>EDIT'), ['action' => 'edit', $student->student_id], ['class' => 'btn btn-outline-warning font-weight-bold mr-2', 'escape' => false]) ?>
        
        <?= $this->Form->postLink(__('<i class="fas fa-trash-alt mr-2"></i>DELETE'), ['action' => 'delete', $student->student_id], [
            'confirm' => __('Are you sure you want to delete data for {0}?', $student->full_name), 
            'class' => 'btn btn-outline-danger font-weight-bold', 
            'escape' => false
        ]) ?>
    </div>
</div>