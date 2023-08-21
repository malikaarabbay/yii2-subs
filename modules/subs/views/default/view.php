<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\subs\models\Subscribers $model */

$this->title = $model->email;
$this->params['breadcrumbs'][] = ['label' => 'Подписчики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="subscribers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'event_id',
                'value' => function ($model) {
                    return $model->eventValue;
                }
            ],
            'email:email',
            [
                'attribute' => 'is_blocked',
                'filter'    => Yii::$app->params['yesOrNot'],
                'value'     => function ($model) {
                    return Yii::$app->params['yesOrNot'][$model->is_blocked];
                },
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
