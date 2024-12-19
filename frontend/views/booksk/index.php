<?php

use app\models\Books;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Книги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить книгу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
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
            'IDb',
            'Author',
            'Name',
            'Pages',
            //'Year',
            //'Genre',
            //'AgeL',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Books $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'IDb' => $model->IDb]);
                 }
            ],
        ],
    ]); ?>


</div>
