<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\subs\models\Subscribers $model */

$this->title = 'Изменить подписчика: ' . $model->email;
$this->params['breadcrumbs'][] = ['label' => 'Подписчики', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="subscribers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
