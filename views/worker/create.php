<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Worker $model */

$this->title = 'Добавление работника';
$this->params['breadcrumbs'][] = ['label' => 'Работники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
