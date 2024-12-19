<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\ContactForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-5">
          <p>
          <br>Директор: Тоболь Ольга Васильевна
          <br>Адрес: г. Ангарск, 665838, 17 микрорайон, дом 4.
          <br>Телефон: 8 (3955) 55-10-22.
          <br>сайт: https://cbs-angarsk.ru
          <br>e-mail: bs-angarsk@yandex.ru
          <br>ВК: https://vk.com/biblioteki_angarska
          <br>ОК: https://ok.ru/bibliotekiangarska
          <br>Заместитель директора по основным библиотечным вопросам:
          <br>Трубина Алёна Сергеевна
          <br>Адрес: г. Ангарск, 665838, 17 микрорайон, дом 4.
          <br>Телефон: 8 (3955) 55-09-61.
          </p>
          <p>
          <br>Заместитель директора по работе с детьми:
          <br>Рогачкова Евгения Александровна
          <br>Адрес: г. Ангарск, 665813, 106 квартал, дом 8.
          <br>Телефон: 8 (3955) 52-30-58.
          </p>
          <p>
          <br>Заместитель директора по административно-хозяйственной работе:
          <br>Лозовая Светлана Анатольевна
          <br>Адрес: г. Ангарск, 665838, 17 микрорайон, дом 4.
          <br>Телефон: 8 (3955) 55-10-22.
          </p>
          <p>
          <br>Главный бухгалтер:
          <br>Красножон Надежда Викторовна
          <br>Адрес: г. Ангарск, 665838, 18 микрорайон, дом 1.
          <br>Телефон: 8 (3955)55-04-40
          </p>
        </div>
    </div>

</div>
