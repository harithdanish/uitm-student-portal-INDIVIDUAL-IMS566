<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 font-weight-bold">EDIT STUDENT</h1>
        <?= $this->Form->postLink(__('<i class="fas fa-trash-alt mr-2"></i>DELETE STUDENT'), ['action' => 'delete', $student->student_id], [
            'confirm' => __('Are you sure you want to delete data for {0}?', $student->full_name), 
            'class' => 'btn btn-outline-danger font-weight-bold', 
            'escape' => false
        ]) ?>
    </div>

    <div class="card shadow-sm border-0" style="border-radius: 12px;">
        <div class="card-header bg-warning text-dark py-3" style="border-radius: 12px 12px 0 0;">
            <h6 class="m-0 font-weight-bold"><i class="fas fa-edit mr-2"></i>Update Student Information</h6>
        </div>
        <div class="card-body p-4">
            <?= $this->Form->create($student) ?>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold">Student Number</label>
                    <?= $this->Form->control('student_number', ['label' => false, 'class' => 'form-control', 'value' => $student->student_number ?? $student->student_id]) ?>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold">IC Number</label>
                    <?= $this->Form->control('ic_number', ['label' => false, 'class' => 'form-control', 'value' => $student->ic_number ?? '040101-01-1234']) ?>
                </div>
                
                <div class="col-md-12 mb-3">
                    <label class="font-weight-bold">Full Name</label>
                    <?= $this->Form->control('full_name', ['label' => false, 'class' => 'form-control']) ?>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold">Faculty</label>
                    <?= $this->Form->control('faculty', ['label' => false, 'class' => 'form-control']) ?>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold">Course</label>
                    <?= $this->Form->control('course', ['label' => false, 'class' => 'form-control', 'value' => $student->course ?? 'IMS566']) ?>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold">Semester</label>
                    <?= $this->Form->control('semester', ['label' => false, 'class' => 'form-control', 'value' => $student->semester ?? '4']) ?>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold">Email</label>
                    <?= $this->Form->control('email', ['label' => false, 'class' => 'form-control', 'value' => $student->email ?? 'harith@gmail.com']) ?>
                </div>
            </div>

            <div class="mt-4 mb-5">
                    <?= $this->Html->link(__('<i class="fas fa-arrow-left mr-2"></i>CANCEL'), ['action' => 'view', $student->student_id], [
                    'class' => 'btn btn-outline-secondary font-weight-bold',
        'escape' => false
                ]) ?>
                
                
                <?= $this->Form->button(__('SAVE CHANGES'), [
                    'class' => 'btn btn-outline-success font-weight-bold', 
                    'escape' => false
                ]) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>