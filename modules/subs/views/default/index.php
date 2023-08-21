<?php

use app\modules\subs\models\Subscribers;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\subs\models\SubscribersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Подписчики';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscribers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать подписчика', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'event_id',
                'value' => function ($model) {
                    return $model->eventValue;
                },
                'filter' => Subscribers::getEventList()
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
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Subscribers $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
