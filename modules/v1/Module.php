<?php

namespace app\modules\v1;


/**
 * User module
 *
 */
class Module extends \yii\base\Module
{
    /**
     * @var string Alias for module
     */
    public $alias = "@v1";
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\v1\controllers';

    public function init()
    {
        parent::init();
        \Yii::$app->user->enableSession = false;
    }




}
