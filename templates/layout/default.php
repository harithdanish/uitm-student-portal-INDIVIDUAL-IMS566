<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UiTM Student Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* 1. DEFAULT: Background putih untuk semua page */
        body {
            background-color: #ffffff !important;
            background-image: none !important;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: background-color 0.3s ease;
            body.bg-dark {
        background-color: #121212 !important;
    }
}

        /* 2. KHAS UNTUK LOGIN: Wallpaper UiTM */
        <?php if ($this->request->getParam('controller') === 'Students' && $this->request->getParam('action') === 'login'): ?>
        body {
            background-image: url('<?= $this->Url->image('IMG_9880.jpg') ?>') !important;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            body.bg-dark table {
        background-color: #ffffff !important;
        color: #000000 !important;
    }
        }
        <?php endif; ?>

        /* 3. Navbar & Footer - Warna Hijau UiTM (Kekal Solid) */
        nav.navbar, footer {
            background-color: #1d8c35 !important;
        }

        /* 4. Main Content */
        .main-content {
            flex: 1;
            width: 100%;
            padding: 40px 50px !important; 
            margin-top: 20px;
        }

        /* --- DARK MODE --- */
        body.bg-dark {
            background-color: #121212 !important;
        }

        /* Paksa Navbar kekal hijau walaupun Dark Mode */
        body.bg-dark nav.navbar {
            background-color: #1d8c35 !important;
        }

        body.bg-dark .main-content {
            background: transparent !important;
            color: #e0e0e0 !important;
        }

        body.bg-dark footer {
            background-color: #1d8c35 !important;
            color: #ffffff !important;
        }

        /* Pastikan teks dalam table & card nampak dalam Dark Mode */
        body.bg-dark .card, 
        body.bg-dark table, 
        body.bg-dark table th, 
        body.bg-dark table td {
            background-color: #1e1e1e !important;
            color: #ffffff !important;
            border-color: #333 !important;
        }

                /* Paksa legend text ikut warna parent/body */
        .chartjs-legend-text {
            color: inherit !important;
        }
        
        /* Paksa label checkbox nampak jelas dalam semua mode */
.form-check-label, 
input[type="checkbox"] + label {
    color: #000000 !important; /* Paksa hitam untuk nampak jelas atas background putih */
    font-weight: 500;
}

/* Jika kau guna container khas untuk senarai pelajar */
.student-list-container {
    background-color: #ffffff !important;
    color: #000000 !important;
    padding: 10px;
    border: 1px solid #ccc;
}

/* KHAS UNTUK DARK MODE: Kalau background kawasan tu gelap */
body.bg-dark .student-list-container {
    background-color: #1e1e1e !important;
    color: #ffffff !important;
}

/* CSS ni akan buat table kau gelap bila Dark Mode on */
body.bg-dark table tbody tr {
    background-color: #1e1e1e !important;
    color: #ffffff !important;
}

/* Pastikan border table pun nampak cantik dalam Dark Mode */
body.bg-dark table, 
body.bg-dark table th, 
body.bg-dark table td {
    border-color: #333 !important;
}

/* Tetapan kekal untuk semua Header Table (thead) supaya jadi Hitam Pekat */
table thead, 
table thead tr, 
table thead th {
    background-color: #212529 !important; /* Hitam Pekat */
    color: #ffffff !important;            /* Teks Putih */
    border-color: #212529 !important;     /* Hilangkan border warna lain */
}
        
    </style>
</head>
<body id="body">

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/dashboard">UiTM Student Portal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><?= $this->Html->link('Dashboard', ['controller' => 'Pages', 'action' => 'dashboard'], ['class' => 'nav-link']) ?></li>
                <li class="nav-item"><?= $this->Html->link('Students', ['controller' => 'Students', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                <li class="nav-item"><?= $this->Html->link('Subjects', ['controller' => 'Subjects', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                <li class="nav-item"><?= $this->Html->link('Assignments', ['controller' => 'Assignments', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                <li class="nav-item"><?= $this->Html->link('Attendance', ['controller' => 'Attendance', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                
                <li class="nav-item ms-2">
                    <button onclick="toggleDarkMode()" style="background:none; border:none; cursor:pointer; color:white; font-size: 20px;">
                        <i id="themeIcon" class="fas fa-moon"></i>
                    </button>
                </li>
                <li class="nav-item"><?= $this->Html->link('Logout', ['controller' => 'Students', 'action' => 'login'], ['class' => 'nav-link text-danger']) ?></li>
            </ul>
        </div>
    </div>
</nav>

<div class="main-content">
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
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun');
        localStorage.setItem("darkmode", "true");
    } else {
        icon.classList.remove('fa-sun');
        icon.classList.add('fa-moon');
        localStorage.setItem("darkmode", "false");
    }
}

window.onload = function() {
    const icon = document.getElementById('themeIcon');
    if (localStorage.getItem("darkmode") === "true") {
        document.body.classList.add("bg-dark");
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun');
    }
}
</script>
</body>
</html>