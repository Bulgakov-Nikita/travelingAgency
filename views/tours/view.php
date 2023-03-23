<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Tours $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Туры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tours-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы точно хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
                'label' => 'Дата создания',
                'attribute' => 'created_at',
                'value' => function ($model) {
                    return date('Y-m-d H:i:s', strtotime($model->created_at));
                }
            ],
        ],
    ]) ?>

</div>
