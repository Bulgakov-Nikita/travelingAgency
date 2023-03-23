<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solded_tours".
 *
 * @property int $client_id
 * @property int $tour_id
 */
class SoldedTours extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'solded_tours';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'tour_id'], 'required'],
            [['client_id', 'tour_id'], 'integer'],
            [['client_id', 'tour_id'], 'unique', 'targetAttribute' => ['client_id', 'tour_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'client_id' => 'ID клиента',
            'tour_id' => 'ID тура',
            'date' => 'Дата покупки',
        ];
    }
}
