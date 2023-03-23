<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Tours $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tours-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hotel_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'destination')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nights')->textInput() ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'departure_date')->widget(DateTimePicker::class, [
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd hh:ii',
            'todayHighlight' => true,
        ]
    ]); ?>

    <?= $form->field($model, 'departure_place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'persons')->textInput() ?>

    <?= $form->field($model, 'is_actual')->dropDownList([1 => 'Да', 0 => 'Нет']) ?>

    <div class="form-group">
        <br>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
