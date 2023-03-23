<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Client $model */

$this->title = 'Создание аккаунта';
$this->params['breadcrumbs'][] = ['label' => 'Клиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
