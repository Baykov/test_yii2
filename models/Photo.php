<?php

namespace app\models;

use app\modules\v1\helpers\ImagesHelper;
use Yii;

/**
 * This is the model class for table "photos".
 *
 * @property int $id
 * @property int $album_id
 * @property string|null $title
 */
class Photo extends ApiModel
{

    public function getUrl()
    {
        return ImagesHelper::getRandomImage();
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'photos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['album_id'], 'required'],
            [['album_id'], 'integer'],
            [['title'], 'string', 'max' => 70],
        ];
    }

    public function fields()
    {
        return ['album_id', 'title', 'url'];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'album_id' => 'Album ID',
            'title' => 'Title',
        ];
    }


}
