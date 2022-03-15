<?php

namespace app\modules\v1\helpers;

use Yii;
use yii\base\BaseObject;
use yii\helpers\Url;

/**
 * This is the model class for table "photos".
 *
 * @property int $id
 * @property int $album_id
 * @property string|null $title
 */
class ImagesHelper
{

    public static function getRandomImage() {
        return Url::to('/storage/images/'.self::getImages()[rand(1, count(self::getImages()))].'.jpg', true);
    }

    public static function getImages() {
        return range(1, 10);
    }

}
