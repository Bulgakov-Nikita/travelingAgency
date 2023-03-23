<?php

use app\models\SoldedTours;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Проданные туры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solded-tours-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'client_id',
            'tour_id',
            [
                'label' => 'Дата покупки',
                'attribute' => 'date',
                'value' => function ($model) {
                    return date('Y-m-d H:i:s', strtotime($model->date));
                }
            ],
        ],
    ]); ?>


</div>
