<div class="container-fluid py-4">
    <h1 class="h3 mb-4 font-weight-bold">ADD NEW STUDENT</h1>

    <div class="card shadow-sm border-0" style="border-radius: 12px;">
        <div class="card-header bg-primary text-white py-3" style="border-radius: 12px 12px 0 0;">
            <h6 class="m-0 font-weight-bold"><i class="fas fa-user-plus mr-2"></i>Student Registration Form</h6>
        </div>
        <div class="card-body p-4">
            <?= $this->Form->create($student, ['novalidate' => true]) ?>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold">Student Number</label>
                    <?= $this->Form->control('student_number', ['label' => false, 'class' => 'form-control', 'placeholder' => 'e.g. 2026123456']) ?>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold">IC Number</label>
                    <?= $this->Form->control('ic_number', ['label' => false, 'class' => 'form-control', 'placeholder' => '040101-01-1234']) ?>
                </div>
                
                <div class="col-md-12 mb-3">
                    <label class="font-weight-bold">Full Name</label>
                    <?= $this->Form->control('full_name', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Enter full name']) ?>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold">Faculty</label>
                    <?= $this->Form->control('faculty', ['label' => false, 'class' => 'form-control']) ?>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold">Course</label>
                    <?= $this->Form->control('course', ['label' => false, 'class' => 'form-control']) ?>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold">Semester</label>
                    <?= $this->Form->control('semester', ['label' => false, 'class' => 'form-control']) ?>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold">Email</label>
                    <?= $this->Form->control('email', ['label' => false, 'class' => 'form-control', 'placeholder' => 'student@email.com']) ?>
                </div>
            </div>

            <div class="mt-4 pt-3 border-top">
                <?= $this->Html->link(__('CANCEL'), ['action' => 'index'], ['class' => 'btn btn-outline-secondary mr-2 font-weight-bold']) ?>
                <button type="submit" class="btn btn-primary font-weight-bold shadow-sm">
                    <i class="fas fa-save mr-2"></i>SUBMIT STUDENT NOW
                </button>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
