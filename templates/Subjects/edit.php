<h1 class="mb-4">EDIT SUBJECT</h1>

<div class="card shadow-sm border-0" style="border-radius: 12px; overflow: hidden;">
    <div class="card-header bg-warning py-3">
        <h6 class="m-0 font-weight-bold text-dark">Update Subject Information Form</h6>
    </div>
    
    <div class="card-body p-0">
        <?= $this->Form->create($subject) ?>
        <table class="table table-hover m-0">
            <tbody>
                <tr>
                    <th width="30%" class="align-middle pl-4">SUBJECT CODE</th>
                    <td class="align-middle">
                        <?= $this->Form->control('subject_code', ['label' => false, 'class' => 'form-control', 'required' => true]) ?>
                    </td>
                </tr>
                <tr>
                    <th class="align-middle pl-4">SUBJECT NAME</th>
                    <td class="align-middle">
                        <?= $this->Form->control('subject_name', ['label' => false, 'class' => 'form-control', 'required' => true]) ?>
                    </td>
                </tr>
                <tr>
                    <th class="align-middle pl-4">LECTURER NAME</th>
                    <td class="align-middle">
                        <?= $this->Form->control('lecturer_name', ['label' => false, 'class' => 'form-control', 'required' => true]) ?>
                    </td>
                </tr>
                <tr>
                    <th class="align-middle pl-4">CREDIT HOUR</th>
                    <td class="align-middle">
                        <?= $this->Form->control('credit_hour', ['label' => false, 'class' => 'form-control', 'type' => 'number', 'required' => true]) ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4 mb-5">
    <?= $this->Html->link(__('<i class="fas fa-arrow-left mr-2"></i>CANCEL'), ['action' => 'view', $subject->subject_id], [
        'class' => 'btn btn-outline-secondary font-weight-bold',
        'escape' => false
    ]) ?>
    
    <?= $this->Form->button(__('SAVE CHANGES'), [
        'class' => 'btn btn-outline-success font-weight-bold mx-2',
        'escape' => false
    ]) ?>
    
    <?= $this->Form->postLink(__('<i class="fas fa-trash-alt mr-2"></i>DELETE'), ['action' => 'delete', $subject->subject_id], [
        'confirm' => __('Are you sure you want to delete this subject?'),
        'class' => 'btn btn-outline-danger font-weight-bold',
        'escape' => false
    ]) ?>
</div>
<?= $this->Form->end() ?>
