<h1 class="mb-4">SUBJECT DETAILS</h1>

<div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-primary text-white py-2">
        <h6 class="m-0 font-weight-bold">Complete Subject Information</h6>
    </div>
    
    <div class="card-body p-0">
        <table class="table table-hover table-bordered m-0">
            <tbody>
                <tr>
                    <th width="30%" class="align-middle">SUBJECT CODE</th>
                    <td class="align-middle font-weight-bold text-uppercase"><?= h($subject->subject_code) ?></td>
                </tr>
                <tr>
                    <th class="align-middle">SUBJECT NAME</th>
                    <td class="align-middle"><?= h($subject->subject_name) ?></td>
                </tr>
                <tr>
                    <th class="align-middle">LECTURER NAME</th>
                    <td class="align-middle"><?= h($subject->lecturer_name) ?></td>
                </tr>
                <tr>
                    <th class="align-middle">CREDIT HOUR</th>
                    <td class="align-middle"><?= h($subject->credit_hour) ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="mb-5">
    <?= $this->Html->link('BACK', ['action' => 'index'], ['class' => 'btn btn-outline-secondary font-weight-bold']) ?>
    <?= $this->Html->link('EDIT', ['action' => 'edit', $subject->subject_id], ['class' => 'btn btn-outline-warning font-weight-bold mx-2']) ?>
    <?= $this->Form->postLink('DELETE', ['action' => 'delete', $subject->subject_id], ['confirm' => 'Are you sure?', 'class' => 'btn btn-outline-danger font-weight-bold']) ?>
</div>