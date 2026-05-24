<div style="display: flex; justify-content: center; align-items: center; min-height: 80vh; width: 100%;">
    <div style="width: 100%; max-width: 400px; padding: 20px;">
        
        <div class="card shadow" style="border: none; border-radius: 15px; overflow: hidden;">
            <div class="card-header bg-dark text-white text-center py-3">
                <h5 class="mb-0">UiTM Student Portal</h5>
            </div>
            <div class="card-body p-4">
                <h3 class="text-center mb-4">Welcome</h3>
                
                

                <?= $this->Form->create(null, ['url' => ['controller' => 'Students', 'action' => 'login']]) ?>
                    <div class="mb-3">
                        <label class="form-label">Student ID / Email</label>
                        <?= $this->Form->control('student_number', [
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => 'Enter Student ID or Email',
                            'required' => true
                        ]) ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <?= $this->Form->control('password', [
                            'type' => 'password',
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => 'Enter Password',
                            'required' => true
                        ]) ?>
                    </div>
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                <?= $this->Form->end() ?>
                
                <div class="text-center">
    <?= $this->Html->link(
        'Sign Up',
        ['controller' => 'Students', 'action' => 'register'],
        ['style' => 'text-decoration: none;']
    ) ?>
</div>
            </div>
        </div>

    </div>
</div>
