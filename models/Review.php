<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property int $client_id
 * @property int $tour_id
 * @property string $text
 * @property string $created_at
 * @property int $stars
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'tour_id', 'text', 'created_at', 'stars'], 'required'],
            [['client_id', 'tour_id', 'stars'], 'integer'],
            [['text'], 'string'],
            [['created_at'], 'safe'],
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
            'text' => 'Отзыв',
            'created_at' => 'Дата создания',
            'stars' => 'Оценка (5-я шкала)',
        ];
    }
}
