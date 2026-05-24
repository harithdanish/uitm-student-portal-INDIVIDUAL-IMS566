<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Attendance Model
 *
 * @property \App\Model\Table\StudentsTable&\Cake\ORM\Association\BelongsTo $Students
 * @property \App\Model\Table\SubjectsTable&\Cake\ORM\Association\BelongsTo $Subjects
 *
 * @method \App\Model\Entity\Attendance newEmptyEntity()
 * @method \App\Model\Entity\Attendance newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Attendance> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Attendance get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Attendance findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Attendance patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Attendance> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Attendance|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Attendance saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Attendance>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Attendance>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Attendance>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Attendance> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Attendance>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Attendance>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Attendance>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Attendance> deleteManyOrFail(iterable $entities, array $options = [])
 */
class AttendanceTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('attendance');
        $this->setDisplayField('attendance_status');
        $this->setPrimaryKey('attendance_id');

        $this->belongsTo('Students', [
            'foreignKey' => 'student_id',
        ]);
        $this->belongsTo('Subjects', [
            'foreignKey' => 'subject_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('attendance_percentage')
            ->requirePresence('attendance_percentage', 'create')
            ->notEmptyString('attendance_percentage');

        $validator
            ->scalar('attendance_status')
            ->maxLength('attendance_status', 50)
            ->requirePresence('attendance_status', 'create')
            ->notEmptyString('attendance_status');

        $validator
            ->integer('student_id')
            ->allowEmptyString('student_id');

        $validator
            ->integer('subject_id')
            ->allowEmptyString('subject_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['student_id'], 'Students'), ['errorField' => 'student_id']);
        $rules->add($rules->existsIn(['subject_id'], 'Subjects'), ['errorField' => 'subject_id']);

        return $rules;
    }
}
