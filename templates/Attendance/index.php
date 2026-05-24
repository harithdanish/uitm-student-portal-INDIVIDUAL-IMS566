<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 font-weight-bold text-gray-800">ATTENDANCE LIST</h1>
</div>

<div class="card shadow-sm border-0" style="border-radius: 12px; overflow: hidden;">
    <div class="card-body p-0">

        <div class="table-responsive">
            <table class="table table-hover align-middle m-0">

                <thead class="bg-primary text-white">
                    <tr>
                        <th class="pl-4 py-3">NAME</th>
                        <th class="py-3">STUDENT ID</th>
                        <th class="py-3">SUBMITTED</th>
                        <th class="py-3">TOTAL ASSIGNMENTS</th>
                        <th class="py-3">PERCENTAGE</th>
                        <th class="py-3">STATUS</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if (!empty($attendance)): ?>

                        <?php foreach ($attendance as $attend): ?>

                            <?php
                                $name = $attend['name'] ?? '-';
                                $studentNumber = $attend['student_number'] ?? '-';
                                $submitted = $attend['submitted_assignments'] ?? 0;
                                $total = $attend['total_assignments'] ?? 0;
                                $percentage = $attend['percentage'] ?? 0;
                                $status = $attend['status'] ?? 'Poor';
                            ?>

                            <tr>
                                <td class="pl-4 font-weight-bold">
                                    <?= h($name) ?>
                                </td>

                                <td>
                                    <?= h($studentNumber) ?>
                                </td>

                                <td>
                                    <?= h($submitted) ?>
                                </td>

                                <td>
                                    <?= h($total) ?>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="progress me-2" style="width: 120px; height: 10px;">
                                            <div
                                                class="progress-bar <?= $percentage < 40 ? 'bg-danger' : ($percentage < 60 ? 'bg-warning' : ($percentage < 80 ? 'bg-primary' : 'bg-success')) ?>"
                                                role="progressbar"
                                                style="width: <?= h($percentage) ?>%;">
                                            </div>
                                        </div>

                                        <span class="font-weight-bold">
                                            <?= h($percentage) ?>%
                                        </span>
                                    </div>
                                </td>

                                <td>
                                    <?php if ($status === 'Excellent'): ?>
                                        <span class="badge bg-success">Excellent</span>
                                    <?php elseif ($status === 'Good'): ?>
                                        <span class="badge bg-primary">Good</span>
                                    <?php elseif ($status === 'Average'): ?>
                                        <span class="badge bg-warning text-dark">Average</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Poor</span>
                                    <?php endif; ?>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="6" class="text-center text-muted py-5">
                                No attendance records found.
                            </td>
                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>
        </div>

    </div>
</div>