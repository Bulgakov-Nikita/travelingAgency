<?php

use app\models\Tours;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Туры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tours-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить тур', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'hotel_name',
            'description:ntext',
            'destination',
            'nights',
            'cost',
            'departure_date',
            'departure_place',
            'persons',
            [
                'label' => 'Актуально',
                'attribute' => 'is_actual',
                'value' => function ($model) {
                    return $model->is_actual ? 'Да' : 'Нет';
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Tours $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
