<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\subs\models\Subscribers $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="subscribers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_id')->dropDownList($model::getEventList(),
            ['prompt' => 'Выберите событие']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_blocked')->dropDownList(Yii::$app->params['yesOrNot']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
