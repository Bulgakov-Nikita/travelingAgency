<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

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
class Worker extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $username = '';

    public const STATUS_ADMIN = 1;
    public const STATUS_MANAGER = 2;

    public static function tableName()
    {
        return 'worker';
    }

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
            'password' => 'Пароль',
        ];
    }

    public function getPosition()
    {
        return $this->hasOne(Position::class, ['id' => 'position_id']);
    }

    public function validatePassword($password)
    {
        return true;
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public static function findIdentity($id)
    {
        return Worker::findOne($id);
    }

    public static function findByEmail($email) {
        return Worker::findOne(['email' => $email]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return true;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return true;
    }

    public function validateAuthKey($authKey)
    {
        return true;
    }

    public function isAdmin() {
        return $this->position->id == Worker::STATUS_ADMIN;
    }

    public function isManager() {
        return $this->position->id == Worker::STATUS_MANAGER;
    }
}
