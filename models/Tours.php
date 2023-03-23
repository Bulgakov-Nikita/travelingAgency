<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tours".
 *
 * @property int $id
 * @property string $hotel_name
 * @property string $description
 * @property string $destination
 * @property int $nights
 * @property int $cost
 * @property string $departure_date
 * @property string $departure_place
 * @property int $persons
 * @property int $is_actual
 * @property string $created_at
 */
class Tours extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tours';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hotel_name', 'description', 'destination', 'nights', 'cost', 'departure_date', 'departure_place', 'persons', 'is_actual'], 'required'],
            [['description'], 'string'],
            [['nights', 'cost', 'persons', 'is_actual'], 'integer'],
            [['departure_date', 'created_at'], 'safe'],
            [['hotel_name', 'departure_place'], 'string', 'max' => 128],
            [['destination'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hotel_name' => 'Название отеля',
            'description' => 'Описание',
            'destination' => 'Место',
            'nights' => 'Кол-во ночей',
            'cost' => 'Цена',
            'departure_date' => 'Дата отправления',
            'departure_place' => 'Место отправления',
            'persons' => 'Количество человек',
            'is_actual' => 'Актуально',
            'created_at' => 'Дата создания',
        ];
    }
}
