<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Album;
use app\models\Photo;
use app\models\User;
use yii\base\BaseObject;
use yii\console\Controller;
use yii\console\ExitCode;
use Faker\Factory;
/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SeederController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionFill()
    {
        $seeder = new \tebazil\yii2seeder\Seeder();
        $generator = $seeder->getGeneratorConfigurator();
        $fakerConfigurator = $generator->getFakerConfigurator();
        $this->seedUsers($seeder, $generator, $fakerConfigurator);
        $seeder->refill();
        $faker = Factory::create();
        $this->seedAlbums($faker);
        $this->seedPhotos($faker);
        echo 'done!';
    }

    private function seedUsers(\tebazil\yii2seeder\Seeder $seeder, \tebazil\dbseeder\GeneratorConfigurator $generator, \tebazil\dbseeder\FakerConfigurator $faker)
    {
        $seeder->table('users')->columns([
            'id',
            'first_name'=>$faker->firstName,
            'last_name'=>$faker->lastName
        ])->rowQuantity(10);
    }

    public function seedAlbums($faker)
    {
        echo "seed Albums\r\n";
        echo "clear Albums\r\n";
        Album::deleteAll();
        echo "fill Albums\r\n";
        for ($i=1; $i<11; $i++) {
            for ($k=1; $k<11; $k++) {
                $model = new Album();
                $model->setAttributes([
                    'user_id' => $i,
                    'title' => $faker->company
                ]);
                $model->save();
                echo $model->title . "\r\n";
            }
        }
    }

    public function seedPhotos($faker)
    {
        echo "seed Photos\r\n";
        echo "clear Photos\r\n";
        Photo::deleteAll();
        echo "fill Photos\r\n";
        for ($i=1; $i<101; $i++) {
            for ($k=1; $k<11; $k++) {
                $model = new Photo();
                $model->setAttributes([
                    'album_id' => $i,
                    'title' => $faker->company
                ]);
                $model->save();
                echo $model->title . "\r\n";
            }
        }
    }
}
