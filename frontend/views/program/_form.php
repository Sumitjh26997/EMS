<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $model frontend\models\Program */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="program-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'timestamp')->textInput() ?> -->

    <?= $form->field($model, 'date')->widget(
        DatePicker::className(), [
            // inline too, not bad
             'inline' => false,
             // modify template for custom rendering
            //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
    ]);?>
    <!-- <?= $form->field($model, 'date')->textInput() ?> -->

    <?= $form->field($model, 'start_time')->textInput() ?>

    <?= $form->field($model, 'end_time')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <!-- <?= $form->field($model, 'init_weight')->textInput() ?> -->

    <?= $form->field($model, 'priority')->textInput(['maxlength' => true]) ?>


    <!-- <?= $form->field($model, 'program_weight')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
