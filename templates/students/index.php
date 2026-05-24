<div class="container-fluid py-4">

    <div class="mb-4">
        <h1 class="h3 font-weight-bold">STUDENTS</h1>
    </div>

    <div class="card shadow-sm border-0" style="border-radius: 10px; overflow: hidden;">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle m-0">

                    <thead class="bg-light">
                        <tr>
                            <th class="pl-4 py-3">STUDENT ID</th>
                            <th class="py-3">NAME</th>
                            <th class="py-3">FACULTY</th>
                            <th class="text-center py-3">ACTION</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($students as $student): ?>

                        <tr>

                            <td class="pl-4 font-weight-bold">
                                <?= h($student->student_number ?? $student->student_id) ?>
                            </td>

                            <td>
                                <?= h($student->full_name) ?>
                            </td>

                            <td>
                                <?= h($student->faculty) ?>
                            </td>

                            <td class="text-center">

                                <?= $this->Html->link(
                                    __('<i class="fas fa-eye"></i>'),
                                    ['action' => 'view', $student->student_id],
                                    [
                                        'class' => 'btn btn-sm btn-outline-info mr-1',
                                        'escape' => false,
                                        'title' => 'View'
                                    ]
                                ) ?>

                                <?= $this->Html->link(
                                    __('<i class="fas fa-edit"></i>'),
                                    ['action' => 'edit', $student->student_id],
                                    [
                                        'class' => 'btn btn-sm btn-outline-warning mr-1',
                                        'escape' => false,
                                        'title' => 'Edit'
                                    ]
                                ) ?>

                                <?= $this->Form->postLink(
                                    __('<i class="fas fa-trash-alt"></i>'),
                                    ['action' => 'delete', $student->student_id],
                                    [
                                        'confirm' => __('Are you sure you want to delete data for {0}?', $student->full_name),
                                        'class' => 'btn btn-sm btn-outline-danger',
                                        'escape' => false,
                                        'title' => 'Delete'
                                    ]
                                ) ?>

                            </td>

                        </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>