<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Readers".
 *
 * @property int $ticket_number
 * @property string $FIO
 * @property string $address
 * @property string $phone
 *
 * @property Issueofbooks[] $issueofbooks
 */
class Readers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Readers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['FIO', 'address', 'phone'], 'required'],
            [['FIO', 'address', 'phone'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ticket_number' => 'Номер чит билета',
            'FIO' => 'ФИО',
            'address' => 'Адрес',
            'phone' => 'Номер телефона',
        ];
    }

    /**
     * Gets query for [[Issueofbooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIssueofbooks()
    {
        return $this->hasMany(Issueofbooks::class, ['ticket_number' => 'ticket_number']);
    }
}
