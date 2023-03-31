<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var app\models\Worker $model */
/** @var yii\widgets\ActiveForm $form */

$positions = \yii\helpers\ArrayHelper::map(\app\models\Position::find()->all(), 'id', 'name');
?>

<div class="worker-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->widget(MaskedInput::className(),['mask'=>'9 999 999 99 99'])->textInput(['placeholder'=>'_ ___ ___ __ __']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hire_date')->widget(DatePicker::class, [
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
        ]
    ]); ?>

    <?= $form->field($model, 'birthday')->widget(DatePicker::class, [
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
        ]
    ]); ?>

    <?= $form->field($model, 'is_works')->dropDownList([1 => ' Да', 0 => 'Нет']) ?>

    <?= $form->field($model, 'position_id')->dropDownList($positions) ?>

    <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <br>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
