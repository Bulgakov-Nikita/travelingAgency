<?php

use app\models\Worker;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Работники';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить работника', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            'phone',
            'email:email',
            [
                'label' => 'Должность',
                'attribute' => 'position_id',
                'value' => function ($model) {
                    return $model->position->name;
                }
            ],
            [
                'label' => 'Принят на работу',
                'attribute' => 'hire_date',
                'value' => function ($model) {
                    return date('Y-m-d', strtotime($model->hire_date));
                }
            ],
            [
                'label' => 'Дата рождения',
                'attribute' => 'birthday',
                'value' => function ($model) {
                    return date('Y-m-d', strtotime($model->birthday));
                }
            ],
            [
                'label' => 'Ещё работает',
                'attribute' => 'is_works',
                'value' => function ($model) {
                    return $model->is_works ? 'Да' : 'Нет';
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Worker $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
