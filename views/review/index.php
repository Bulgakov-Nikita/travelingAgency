<?php

use app\models\Review;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Отзывы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'client_id',
            'tour_id',
            'text:ntext',
            [
                'label' => 'Дата создания',
                'attribute' => 'created_at',
                'value' => function ($model) {
                    return date('Y-m-d H:i:s', strtotime($model->created_at));
                }
            ],
            'stars',
        ],
    ]); ?>


</div>
