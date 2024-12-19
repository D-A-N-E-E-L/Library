<?php

namespace app\models;
use Yii;
use yii\base\Model;

Class Captcha extends Model
{
  public $captcha;
  public function rules()
  {
    return [['captcha', 'captcha', 'captchaAction' => 'site/captcha']];
  }
  public function attributeLabels()
  {
    return ['captcha' => 'Captcha'];
  }
}
