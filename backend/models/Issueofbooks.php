<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "issueofbooks".
 *
 * @property int $record
 * @property int $ticket_number
 * @property int $IDb
 * @property string $date_of_issue
 * @property string $return_date
 *
 * @property Books $iDb
 * @property Readers $ticketNumber
 */
class Issueofbooks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'issueofbooks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_number', 'IDb', 'date_of_issue', 'return_date'], 'required'],
            [['ticket_number', 'IDb'], 'integer'],
            [['date_of_issue', 'return_date'], 'safe'],
            [['IDb'], 'unique'],
            [['IDb'], 'exist', 'skipOnError' => true, 'targetClass' => Books::class, 'targetAttribute' => ['IDb' => 'IDb']],
            [['ticket_number'], 'exist', 'skipOnError' => true, 'targetClass' => Readers::class, 'targetAttribute' => ['ticket_number' => 'ticket_number']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'record' => '№ Записи',
            'ticket_number' => 'Номер чит билета',
            'IDb' => 'Код книги',
            'date_of_issue' => 'Дата выдачи',
            'return_date' => 'Дата возврата',
        ];
    }

    /**
     * Gets query for [[IDb]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIDb()
    {
        return $this->hasOne(Books::class, ['IDb' => 'IDb']);
    }

    /**
     * Gets query for [[TicketNumber]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTicketNumber()
    {
        return $this->hasOne(Readers::class, ['ticket_number' => 'ticket_number']);
    }
}
