<div style="display: flex; justify-content: center; align-items: center; min-height: 80vh; width: 100%;">
    <div style="width: 100%; max-width: 400px; padding: 20px;">
        
        <div class="card shadow" style="border: none; border-radius: 15px; overflow: hidden;">
            <div class="card-header bg-dark text-white text-center py-3">
                <h5 class="mb-0">UiTM Student Portal</h5>
            </div>
            <div class="card-body p-4">
                <h3 class="text-center mb-4">Welcome</h3>
                
                <?= $this->Form->create() ?>
                    <div class="mb-3">
                        <label class="form-label">Student ID</label>
                        <input type="text" class="form-control" placeholder="Enter Student ID" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password" required>
                    </div>
                    <div class="d-grid mb-3">
                        <?= $this->Html->link('Login', ['controller' => 'Pages', 'action' => 'dashboard'], ['class' => 'btn btn-primary']) ?>
                    </div>
                <?= $this->Form->end() ?>
                
                <div class="text-center">
                    <a href="#" style="text-decoration: none;">Forgot Password?</a> | 
                    <a href="#" style="text-decoration: none;">Sign Up</a>
                </div>
            </div>
        </div>

    </div>
</div>