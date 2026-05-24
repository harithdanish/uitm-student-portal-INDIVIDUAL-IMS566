<h1 class="mb-4">NEW ASSIGNMENT</h1>

<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white py-3">
        <h6 class="m-0 font-weight-bold">
            <i class="fas fa-plus-circle mr-2"></i>Create New Assignment Information Form
        </h6>
    </div>
    
    <div class="card-body">
        <?= $this->Form->create($assignment) ?>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-weight-bold">TITLE</label>
                    <?= $this->Form->control('assignment_title', [
    'label' => false, 
    'class' => 'form-control', 
    'placeholder' => 'Enter Title',
    'required' => true // Tambah ni
]) ?>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-weight-bold">DUE DATE</label>
                    <?= $this->Form->control('due_date', [
    'label' => false, 
    'type' => 'date', 
    'class' => 'form-control',
    'required' => true // Tambah ni
]) ?>
                </div>
            </div>
        </div>

        <div class="form-group mt-3">
            <label class="font-weight-bold d-block mb-2">SELECT STUDENTS</label>
            <div class="student-list-box border p-3 bg-light" style="max-height: 250px; overflow-y: auto; border-radius: 6px;">
                <?= $this->Form->control('student_ids', [
                    'multiple' => 'checkbox', 
                    'options' => $students,
                    'label' => false,
                    'class' => 'mr-2'
                ]) ?>
            </div>
        </div>

        <div class="mt-4">
            <?= $this->Html->link('CANCEL', ['controller' => 'Subjects', 'action' => 'index'], [
                'class' => 'btn btn-outline-secondary font-weight-bold px-4'
            ]) ?>
            <?= $this->Form->button('ASSIGN NOW', [
                'class' => 'btn btn-primary font-weight-bold ml-2 px-4'
            ]) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>

<style>
    /* Memastikan checkbox sentiasa nampak jelas dan kemas */
    .student-list-box label {
        display: block;
        padding: 5px 0;
        cursor: pointer;
        color: #333; /* Warna gelap untuk bacaan jelas */
    }
</style>