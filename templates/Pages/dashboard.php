<div class="container-fluid">
    <h2 class="mb-2 font-weight-bold">Dashboard Overview</h2>
    <p class="text-muted mb-4">Welcome, <?= h($studentSession['full_name'] ?? 'Student') ?>.</p>
    
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0 text-white" style="background: linear-gradient(45deg, #6a11cb, #2575fc); border-radius: 15px;">
                <div class="card-body d-flex align-items-center">
                    <div class="mr-3"><i class="fas fa-tasks fa-3x opacity-50"></i></div>
                    <div>
                        <h6 class="text-uppercase mb-1">Total Assignments</h6>
                        <h2 class="font-weight-bold mb-0"><?= $totalAssignments ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0 text-white" style="background: linear-gradient(45deg, #11998e, #38ef7d); border-radius: 15px;">
                <div class="card-body d-flex align-items-center">
                    <div class="mr-3"><i class="fas fa-check-circle fa-3x opacity-50"></i></div>
                    <div>
                        <h6 class="text-uppercase mb-1">Submitted</h6>
                        <h2 class="font-weight-bold mb-0"><?= $submittedAssignments ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0 text-white" style="background: linear-gradient(45deg, #ff416c, #ff4b2b); border-radius: 15px;">
                <div class="card-body d-flex align-items-center">
                    <div class="mr-3"><i class="fas fa-clock fa-3x opacity-50"></i></div>
                    <div>
                        <h6 class="text-uppercase mb-1">Pending</h6>
                        <h2 class="font-weight-bold mb-0"><?= $pendingAssignments ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 mt-3 p-4" style="border-radius: 15px;">
        <h5 class="mb-4 font-weight-bold">Submission Analysis</h5>
        <div style="max-width: 350px; margin: auto;">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>

<style>
    .opacity-50 { opacity: 0.5; }
    .card { transition: transform 0.3s ease; }
    .card:hover { transform: translateY(-5px); }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart');
    const myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Submitted', 'Pending'],
            datasets: [{
                data: [<?= $submittedAssignments ?>, <?= $pendingAssignments ?>],
                backgroundColor: ['#11998e', '#ff416c'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: { color: document.body.classList.contains('bg-dark') ? '#ffffff' : '#333333' }
                }
            }
        }
    });

    const observer = new MutationObserver(() => {
        const isDark = document.body.classList.contains('bg-dark');
        myPieChart.options.plugins.legend.labels.color = isDark ? '#ffffff' : '#333333';
        myPieChart.update();
    });
    observer.observe(document.body, { attributes: true, attributeFilter: ['class'] });
</script>