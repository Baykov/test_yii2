<?php

namespace app\modules\v1\controllers;

use app\models\Album;

class AlbumsController extends ApiController
{

    public $modelClass = 'app\models\Album';

    public function actionShow($id)
    {
        return Album::find()->where(['id' => $id])->with('photos')->one();
    }

}
