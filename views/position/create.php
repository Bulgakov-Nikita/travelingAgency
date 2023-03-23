<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Position $model */

$this->title = 'Добавление должности';
$this->params['breadcrumbs'][] = ['label' => 'Должности', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="position-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
