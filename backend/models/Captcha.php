<?php

namespace app\models;
use Yii;
use yii\base\Model;

Class Captcha extends Model
{
  public $captcha;
  public function rules() {

    $rules = parent::rules();

    $rules[] = ['captcha', 'required'];
    $rules[] = ['captcha', 'captcha'];

    return $rules;
  }
}
