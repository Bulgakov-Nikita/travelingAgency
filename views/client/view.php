<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Client $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Клиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="client-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'вы точно хотите удалить этот аккаунт?',
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
            'password',
        ],
    ]) ?>

</div>
