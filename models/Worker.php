<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "worker".
 *
 * @property int $id
 * @property string $name
 * @property int $phone
 * @property string $email
 * @property string $hire_date
 * @property string $birthday
 * @property int $is_works
 * @property int $position_id
 */
class Worker extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'worker';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'email', 'hire_date', 'birthday', 'is_works', 'position_id'], 'required'],
            [['is_works', 'position_id'], 'integer'],
            [['hire_date', 'birthday'], 'safe'],
            [['name', 'email'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Полное имя',
            'phone' => 'Номер телефона',
            'email' => 'Email',
            'hire_date' => 'Дата приёма на работу',
            'birthday' => 'День рождения',
            'is_works' => 'Ещё работает',
            'position_id' => 'Должность',
        ];
    }

    public function getPosition()
    {
        return $this->hasOne(Position::class, ['id' => 'position_id']);
    }
}
