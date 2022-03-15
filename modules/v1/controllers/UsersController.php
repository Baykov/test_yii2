<?php

namespace app\modules\v1\controllers;

use app\models\User;

class UsersController extends ApiController
{

    public $modelClass = 'app\models\User';


    public function actionShow($id)
    {
        return User::find()->where(['id' => $id])->with('albums')->one();
    }
}
