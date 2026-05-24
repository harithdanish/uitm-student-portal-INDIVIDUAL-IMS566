<div class="container py-5">

    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-success">
            UiTM Student Portal
        </h1>

        <p class="lead mt-3">
            Welcome to Student Management System
        </p>
    </div>

    <div class="row justify-content-center">

        <div class="col-md-5 mb-4">

            <div class="card shadow-lg border-0 rounded-4 h-100">
                <div class="card-body text-center p-5">

                    <i class="fas fa-user-graduate fa-4x text-success mb-4"></i>

                    <h3 class="mb-3">Student Login</h3>

                    <p class="text-muted mb-4">
                        Access your dashboard, assignments, attendance and subjects.
                    </p>

                    <?= $this->Html->link(
                        'Login',
                        ['controller' => 'Students', 'action' => 'login'],
                        ['class' => 'btn btn-success btn-lg px-4']
                    ) ?>

                </div>
            </div>

        </div>

        <div class="col-md-5 mb-4">

            <div class="card shadow-lg border-0 rounded-4 h-100">
                <div class="card-body text-center p-5">

                    <i class="fas fa-user-plus fa-4x text-primary mb-4"></i>

                    <h3 class="mb-3">Register Account</h3>

                    <p class="text-muted mb-4">
                        Create a new student account to access the portal.
                    </p>

                    <?= $this->Html->link(
                        'Register',
                        ['controller' => 'Students', 'action' => 'register'],
                        ['class' => 'btn btn-primary btn-lg px-4']
                    ) ?>

                </div>
            </div>

        </div>

    </div>

</div>