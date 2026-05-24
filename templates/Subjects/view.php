<h1 class="mb-4">SUBJECT DETAILS</h1>

<div class="card shadow-sm border-0 mb-4" style="border-radius: 12px; overflow: hidden;">
    <div class="card-header bg-dark text-white py-3">
        <h6 class="m-0 font-weight-bold">Complete Subject Information</h6>
    </div>
    
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <tbody>
                <tr>
                    <th width="30%" class="py-3 pl-4">SUBJECT CODE</th>
                    <td class="py-3 font-weight-bold text-uppercase"><?= h($subject->subject_code) ?></td>
                </tr>
                <tr>
                    <th class="py-3 pl-4">SUBJECT NAME</th>
                    <td class="py-3"><?= h($subject->subject_name) ?></td>
                </tr>
                <tr>
                    <th class="py-3 pl-4">LECTURER NAME</th>
                    <td class="py-3"><?= h($subject->lecturer_name) ?></td>
                </tr>
                <tr>
                    <th class="py-3 pl-4">CREDIT HOUR</th>
                    <td class="py-3"><?= h($subject->credit_hour) ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="mb-5">
    <?= $this->Html->link(__('<i class="fas fa-arrow-left mr-2"></i>BACK'), ['action' => 'index'], [
        'class' => 'btn btn-outline-secondary font-weight-bold',
        'escape' => false
    ]) ?>

    <?= $this->Html->link(__('<i class="fas fa-edit mr-2"></i>EDIT'), ['action' => 'edit', $subject->subject_id], [
        'class' => 'btn btn-outline-warning font-weight-bold mx-2',
        'escape' => false
    ]) ?>

    <?= $this->Form->postLink(__('<i class="fas fa-trash-alt mr-2"></i>DELETE'), ['action' => 'delete', $subject->subject_id], [
        'confirm' => __('Are you sure you want to delete this subject?'),
        'class' => 'btn btn-outline-danger font-weight-bold',
        'escape' => false
    ]) ?>
</div>