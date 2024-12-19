<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Books".
 *
 * @property int $IDb
 * @property string $Author
 * @property string $Name
 * @property string $Cover
 * @property int $Pages
 * @property string $Year
 * @property string $Genre
 * @property string $AgeL
 *
 * @property Issueofbooks $issueofbooks
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Author', 'Name', 'Cover', 'Pages', 'Year', 'Genre', 'AgeL'], 'required'],
            [['Cover'], 'string'],
            [['Pages'], 'integer'],
            [['Author', 'Name', 'Genre'], 'string', 'max' => 100],
            [['Year'], 'string', 'max' => 5],
            [['AgeL'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDb' => 'Код',
            'Author' => 'Автор',
            'Name' => 'Название',
            'Cover' => 'Обложка',
            'Pages' => 'Страницы',
            'Year' => 'Год издания',
            'Genre' => 'Жанр',
            'AgeL' => 'Возврастное ограничение',
        ];
    }

    /**
     * Gets query for [[Issueofbooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIssueofbooks()
    {
        return $this->hasOne(Issueofbooks::class, ['IDb' => 'IDb']);
    }
}
