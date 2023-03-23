<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Worker $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Работники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="worker-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
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
            'name',
            'phone',
            'email:email',
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
            'position_id',
            'password',
        ],
    ]) ?>

</div>
