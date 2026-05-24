<h1 class="mb-4 font-weight-bold">ADD NEW SUBJECT</h1>

<div class="card shadow-sm border-0" style="border-radius: 12px; overflow: hidden;">
    <div class="card-header bg-primary py-3">
        <h6 class="m-0 font-weight-bold text-white">
            <i class="fas fa-plus-circle mr-2"></i>Create New Subject Information Form
        </h6>
    </div>
    
    <div class="card-body p-0">
        <?= $this->Form->create($subject) ?>
        <table class="table table-hover m-0">
            <tbody>
                <tr>
                    <th width="30%" class="align-middle pl-4">SUBJECT CODE</th>
                    <td class="align-middle">
                        <?= $this->Form->control('subject_code', ['label' => false, 'class' => 'form-control', 'required' => true, 'placeholder' => 'Enter Subject Code']) ?>
                    </td>
                </tr>
                <tr>
                    <th class="align-middle pl-4">SUBJECT NAME</th>
                    <td class="align-middle">
                        <?= $this->Form->control('subject_name', ['label' => false, 'class' => 'form-control', 'required' => true, 'placeholder' => 'Enter Subject Name']) ?>
                    </td>
                </tr>
                <tr>
                    <th class="align-middle pl-4">LECTURER NAME</th>
                    <td class="align-middle">
                        <?= $this->Form->control('lecturer_name', ['label' => false, 'class' => 'form-control', 'required' => true, 'placeholder' => 'Enter Lecturer Name']) ?>
                    </td>
                </tr>
                <tr>
                    <th class="align-middle pl-4">CREDIT HOUR</th>
                    <td class="align-middle">
                        <?= $this->Form->control('credit_hour', ['label' => false, 'class' => 'form-control', 'type' => 'number', 'required' => true, 'placeholder' => 'Enter Credit Hour']) ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4 mb-5">
    <?= $this->Html->link(__('<i class="fas fa-arrow-left mr-2"></i>CANCEL'), ['action' => 'index'], [
        'class' => 'btn btn-outline-secondary font-weight-bold',
        'escape' => false
    ]) ?>
    
    <button type="submit" class="btn btn-primary font-weight-bold shadow-sm">
                    <i class="fas fa-save mr-2"></i>SUBMIT SUBJECT NOW
    </button>
    
    
</div>
<?= $this->Form->end() ?>
