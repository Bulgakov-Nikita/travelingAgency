<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $name
 * @property int $phone
 * @property string $email
 * @property string $register_date
 * @property string $birthday_date
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'email', 'birthday_date'], 'required'],
            [['register_date', 'birthday_date'], 'safe'],
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
            'register_date' => 'Дата регистрации',
            'birthday_date' => 'День рождения',
        ];
    }
}
