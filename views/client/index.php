<?php

use app\models\Client;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Клиенты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать аккаунт клиента', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            'phone',
            'email:email',
            [
                'label' => 'Дата регистрации',
                'attribute' => 'register_date',
                'value' => function ($model) {
                    return date('Y-m-d', strtotime($model->register_date));
                }
            ],
            [
                'label' => 'Дата рождения',
                'attribute' => 'birthday_date',
                'value' => function ($model) {
                    return date('Y-m-d', strtotime($model->birthday_date));
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Client $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
