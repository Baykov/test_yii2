<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "albums".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $title
 */
class Album extends ApiModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'albums';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['title'], 'string', 'max' => 70],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'title' => 'Title',
        ];
    }

    public function fields()
    {
        return ['id', 'title'];
    }

    public function extraFields()
    {
        return ['photos'];
    }

    public function getPhotos()
    {
        return $this->hasMany(Photo::className(), ['album_id' => 'id']);
    }

}
