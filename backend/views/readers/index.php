<?php

use app\models\Readers;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ReadersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Читатели';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="readers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить данные о читателе', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'ticket_number',
            'FIO',
            'address',
            'phone',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Readers $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ticket_number' => $model->ticket_number]);
                 }
            ],
        ],
    ]); ?>


</div>
