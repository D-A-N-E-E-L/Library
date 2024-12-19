<?php

/** @var \yii\web\View $this */
/** @var string $content */
use common\models\user;

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    if (!Yii::$app->user->isGuest) {
      $id = yii::$app->user->getId();
      $user = User::find()->where(['id' => $id])->one();
      $level = $user->getAttribute("access_level");
    }
    NavBar::begin([
        'brandLabel' => "<img src='img/logo.png' class='nav-logo'><br>Библеотека",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-light bg-light fixed-top',
        ],
    ]);
    $menuItems[] = ['label' => 'Главная страница', 'url' => ['/site/index']];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Регистрация', 'url' => ['/site/signup']];
    }
    else if ($level == 4) {
      $menuItems = [['label' => 'Главная страница', 'url' => ['/site/index']],
        ['label' => 'Об библеотке', 'url' => ['/site/about']],
        ['label' => 'Книги', 'url' => ['/books/index']],
        ['label' => 'Выдача книг', 'url' => ['/issueofbooks/index']],
        ['label' => 'Читатели', 'url' => ['/readers/index']],
        ['label' => 'Читатели', 'url' => ['/booksp/index']],];
    }
      else if ($level == 1){
      $menuItems = [['label' => 'Главная страница', 'url' => ['/site/index']],
                      ['label' => 'Контакты', 'url' => ['/site/contact']],
                      ['label' => 'Книги', 'url' => ['/books/index']],];
      }
      else if ($level == 2){
      $menuItems = [['label' => 'Главная страница', 'url' => ['/site/index']],
                      ['label' => 'Выдача книг', 'url' => ['/issueofbooks/index']],
                      ['label' => 'Читатели', 'url' => ['/readers/index']],
                      ['label' => 'Список книг', 'url' => ['/booksp/index']],];
    }
      else if ($level == 3){
        $menuItems = [['label' => 'Главная страница', 'url' => ['/site/index']],
          ['label' => 'Добавить новые книги', 'url' => ['/booksk/index']],];
      }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
        'items' => $menuItems,
    ]);
    if (Yii::$app->user->isGuest) {
        echo Html::tag('div',Html::a('Вход в аккаунт',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class'=>'f']);
    } else {
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'f2'])
            . Html::submitButton(
                'Выйти из аккаунта (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout text-decoration-none']
            )
            . Html::endForm();
    }
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
