<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UiTM Student Portal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>

        body {
            background-color: #ffffff !important;
            background-image: none !important;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: background-color 0.3s ease;
        }

        /* LOGIN & REGISTER BACKGROUND */
        <?php if (
            $this->request->getParam('controller') === 'Students' &&
            in_array($this->request->getParam('action'), ['login', 'register'])
        ): ?>

        body {
            background-image: url('<?= $this->Url->image('IMG_9880.jpg') ?>') !important;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        <?php endif; ?>

        nav.navbar,
        footer {
            background-color: #1d8c35 !important;
        }

        .main-content {
            flex: 1;
            width: 100%;
            padding: 40px 50px !important;
            margin-top: 20px;
        }

        /* DARK MODE */
        body.bg-dark {
            background-color: #121212 !important;
            color: #ffffff !important;
        }

        body.bg-dark nav.navbar {
            background-color: #1d8c35 !important;
        }

        body.bg-dark footer {
            background-color: #1d8c35 !important;
            color: #ffffff !important;
        }

        body.bg-dark .main-content {
            color: #ffffff !important;
        }

        body.bg-dark .card,
        body.bg-dark table,
        body.bg-dark table th,
        body.bg-dark table td {
            background-color: #1e1e1e !important;
            color: #ffffff !important;
            border-color: #333 !important;
        }

        body.bg-dark table tbody tr {
            background-color: #1e1e1e !important;
            color: #ffffff !important;
        }

        table thead,
        table thead tr,
        table thead th {
            background-color: #212529 !important;
            color: #ffffff !important;
            border-color: #212529 !important;
        }

        .form-check-label,
        input[type="checkbox"] + label {
            color: #000000 !important;
            font-weight: 500;
        }

        body.bg-dark .form-check-label,
        body.bg-dark input[type="checkbox"] + label {
            color: #ffffff !important;
        }

        .student-list-container {
            background-color: #ffffff !important;
            color: #000000 !important;
            padding: 10px;
            border: 1px solid #ccc;
        }

        body.bg-dark .student-list-container {
            background-color: #1e1e1e !important;
            color: #ffffff !important;
        }

    </style>
</head>

<body id="body">

<?php
$session = $this->request->getSession();

$isLoggedIn = $session->check('Student');

$currentController = $this->request->getParam('controller');
$currentAction = $this->request->getParam('action');

$isAuthPage = (
    $currentController === 'Students' &&
    in_array($currentAction, ['login', 'register'])
);
?>

<nav class="navbar navbar-expand-lg navbar-dark">

    <div class="container-fluid">

        <?= $this->Html->link(
            'UiTM Student Portal',

            $isLoggedIn
                ? ['controller' => 'Pages', 'action' => 'dashboard']
                : ['controller' => 'Pages', 'action' => 'home'],

            ['class' => 'navbar-brand']
        ) ?>

        <?php if ($isLoggedIn): ?>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <?= $this->Html->link(
                        'Dashboard',
                        ['controller' => 'Pages', 'action' => 'dashboard'],
                        ['class' => 'nav-link']
                    ) ?>
                </li>

                <li class="nav-item">
                    <?= $this->Html->link(
                        'Students',
                        ['controller' => 'Students', 'action' => 'index'],
                        ['class' => 'nav-link']
                    ) ?>
                </li>

                <li class="nav-item">
                    <?= $this->Html->link(
                        'Subjects',
                        ['controller' => 'Subjects', 'action' => 'index'],
                        ['class' => 'nav-link']
                    ) ?>
                </li>

                <li class="nav-item">
                    <?= $this->Html->link(
                        'Assignments',
                        ['controller' => 'Assignments', 'action' => 'index'],
                        ['class' => 'nav-link']
                    ) ?>
                </li>

                <li class="nav-item">
                    <?= $this->Html->link(
                        'Attendance',
                        ['controller' => 'Attendance', 'action' => 'index'],
                        ['class' => 'nav-link']
                    ) ?>
                </li>

                <li class="nav-item ms-2">
                    <button
                        onclick="toggleDarkMode()"
                        style="background:none; border:none; cursor:pointer; color:white; font-size:20px;"
                    >
                        <i id="themeIcon" class="fas fa-moon"></i>
                    </button>
                </li>

                <li class="nav-item">
                    <?= $this->Html->link(
                        'Logout',
                        ['controller' => 'Students', 'action' => 'logout'],
                        ['class' => 'nav-link text-warning']
                    ) ?>
                </li>

            </ul>

        </div>

        <?php endif; ?>

    </div>

</nav>

<div class="main-content">

    <div class="container mt-3">
        <?= $this->Flash->render() ?>
    </div>

    <?= $this->fetch('content') ?>

</div>

<footer class="text-white text-center p-4 mt-auto">
    <h5>UiTM Student Portal</h5>
    <p>IMS566 Advanced Web Design Development and Content Management</p>
    <small>Developed by Muhammad Harith Danish</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>

function toggleDarkMode() {

    const body = document.body;
    const icon = document.getElementById('themeIcon');

    body.classList.toggle("bg-dark");

    if (body.classList.contains("bg-dark")) {

        if (icon) {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
        }

        localStorage.setItem("darkmode", "true");

    } else {

        if (icon) {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
        }

        localStorage.setItem("darkmode", "false");
    }
}

window.onload = function() {

    const icon = document.getElementById('themeIcon');

    if (localStorage.getItem("darkmode") === "true") {

        document.body.classList.add("bg-dark");

        if (icon) {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
        }
    }
}

</script>

</body>
</html>