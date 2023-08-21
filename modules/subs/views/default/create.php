<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\subs\models\Subscribers $model */

$this->title = 'Создать подписчика';
$this->params['breadcrumbs'][] = ['label' => 'Подписчики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscribers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
