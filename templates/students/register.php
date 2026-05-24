<div style="display: flex; justify-content: center; align-items: center; min-height: 80vh; width: 100%;">
    <div style="width: 100%; max-width: 850px; padding: 20px;">
        <div class="card shadow" style="border: none; border-radius: 15px; overflow: hidden;">
            <div class="card-header bg-dark text-white text-center py-3">
                <h5 class="mb-0">Student Registration</h5>
            </div>
            <div class="card-body p-4">
                <h3 class="text-center mb-4">Create Student Account</h3>

                <?= $this->Flash->render() ?>

                <?= $this->Form->create($student, ['url' => ['controller' => 'Students', 'action' => 'register'], 'novalidate' => true]) ?>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Student Number</label>
                            <?= $this->Form->control('student_number', ['label' => false, 'class' => 'form-control', 'placeholder' => 'e.g. 2026123456', 'required' => true]) ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">IC Number</label>
                            <?= $this->Form->control('ic_number', ['label' => false, 'class' => 'form-control', 'placeholder' => '040101-01-1234', 'required' => true]) ?>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold">Full Name</label>
                            <?= $this->Form->control('full_name', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Enter full name', 'required' => true]) ?>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Faculty</label>
                            <?= $this->Form->control('faculty', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Enter faculty', 'required' => true]) ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Course</label>
                            <?= $this->Form->control('course', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Enter course', 'required' => true]) ?>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Semester</label>
                            <?= $this->Form->control('semester', ['label' => false, 'class' => 'form-control', 'placeholder' => 'e.g. 5', 'required' => true]) ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <?= $this->Form->control('email', ['type' => 'email', 'label' => false, 'class' => 'form-control', 'placeholder' => 'student@email.com', 'required' => true]) ?>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Password</label>
                            <?= $this->Form->control('password', ['type' => 'password', 'label' => false, 'class' => 'form-control', 'placeholder' => 'Enter password', 'required' => true]) ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Confirm Password</label>
                            <?= $this->Form->control('confirm_password', ['type' => 'password', 'label' => false, 'class' => 'form-control', 'placeholder' => 'Re-enter password', 'required' => true]) ?>
                        </div>
                    </div>

                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-success fw-bold">Register</button>
                    </div>
                <?= $this->Form->end() ?>

                <div class="text-center mt-3">
                    Already have an account?
                    <?= $this->Html->link('Login here', ['controller' => 'Students', 'action' => 'login'], ['style' => 'text-decoration: none;']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
