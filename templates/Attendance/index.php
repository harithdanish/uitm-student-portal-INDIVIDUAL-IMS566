<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 font-weight-bold text-gray-800">ATTENDANCE LIST</h1>
</div>

<div class="card shadow-sm border-0" style="border-radius: 12px; overflow: hidden;">
    <div class="card-body p-0">
        <table class="table table-hover align-middle m-0">
            <thead class="bg-primary text-white">
                <tr>
                    <th class="pl-4 py-3">NAME</th>
                    <th class="py-3">STUDENT ID</th>
                    <th class="py-3">PERCENTAGE</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($attendance)): ?>
                    <?php foreach ($attendance as $attend): ?>
                        <tr>
                            <td class="pl-4 font-weight-bold"><?= h($attend['name']) ?></td>
                            <td><?= h($attend['student_number']) ?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="progress mr-2" style="width: 100px; height: 10px;">
                                        <div class="progress-bar <?= $attend['percentage'] < 80 ? 'bg-danger' : 'bg-success' ?>" 
                                             role="progressbar" 
                                             style="width: <?= h($attend['percentage']) ?>%;">
                                        </div>
                                    </div>
                                    <span class="font-weight-bold"><?= h($attend['percentage']) ?>%</span>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center text-muted py-5">No attendance records found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    const labels = [<?php foreach($attendance as $a) echo "'".$a['name']."',"; ?>];
    const data = [<?php foreach($attendance as $a) echo $a['percentage'].","; ?>];
    // Pastikan chart anda diinisialisasi di sini atau di file layout utama
</script>