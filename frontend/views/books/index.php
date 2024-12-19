<?php

use app\models\Books;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BooksSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\Books $model */

$this->title = 'Книги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
          [
            'label' => 'Картинка',
            'format' => 'raw',
            'value' => function ($model) {
              $image = $model['Cover'];
              return Html::img("data:image/jpeg;base64,".base64_encode($image)."",["width"=>"70px","height"=>"100px"]);
            },
          ],
            'Author',
            'Name',
            'Pages',
            //'Year',
            //'Genre',
            //'AgeL',
            [
                'class' => ActionColumn::className(),
              'visibleButtons' => ['update' => false, 'delete' => false],
                'urlCreator' => function ($action, Books $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'IDb' => $model->IDb]);
                 }
            ],
        ],
    ]); ?>


</div>
