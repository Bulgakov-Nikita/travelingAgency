<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Worker $model */

$this->title = 'Update Worker: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Работники', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="worker-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
