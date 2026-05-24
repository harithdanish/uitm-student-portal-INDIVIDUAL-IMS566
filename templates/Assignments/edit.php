<h1 class="mb-4">EDIT SUBJECT</h1>

<div class="card shadow-sm border-0">
    <div class="card-header bg-warning py-2">
        <h6 class="m-0 font-weight-bold">Update Subject Information Form</h6>
    </div>
    
    <div class="card-body p-0">
        <?= $this->Form->create($subject) ?>
        <table class="table table-hover table-bordered m-0">
            <tbody>
                <tr>
                    <th width="30%" class="align-middle">SUBJECT CODE</th>
                    <td><?= $this->Form->control('subject_code', ['label' => false, 'class' => 'form-control', 'required' => true]) ?></td>
                </tr>
                <tr>
                    <th class="align-middle">SUBJECT NAME</th>
                    <td><?= $this->Form->control('subject_name', ['label' => false, 'class' => 'form-control', 'required' => true]) ?></td>
                </tr>
                <tr>
                    <th class="align-middle">LECTURER NAME</th>
                    <td><?= $this->Form->control('lecturer_name', ['label' => false, 'class' => 'form-control', 'required' => true]) ?></td>
                </tr>
                <tr>
                    <th class="align-middle">CREDIT HOUR</th>
                    <td><?= $this->Form->control('credit_hour', ['label' => false, 'class' => 'form-control', 'type' => 'number', 'required' => true]) ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4 mb-5">
    <?= $this->Html->link('CANCEL', ['action' => 'view', $subject->subject_id], ['class' => 'btn btn-outline-secondary font-weight-bold']) ?>
    <?= $this->Form->button('SAVE CHANGES', ['class' => 'btn btn-outline-success font-weight-bold mx-2']) ?>
    <?= $this->Form->postLink('DELETE', ['action' => 'delete', $subject->subject_id], ['confirm' => 'Are you sure?', 'class' => 'btn btn-outline-danger font-weight-bold']) ?>
</div>
<?= $this->Form->end() ?>