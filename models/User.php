<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property int|null $first_name
 * @property string|null $last_name
 */
class User extends ApiModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name'], 'integer'],
            [['last_name'], 'string', 'max' => 70],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
        ];
    }

    public function fields()
    {
        return ['id', 'first_name', 'last_name'];
    }

    public function extraFields()
    {
        return ['albums'];
    }

    public function getAlbums()
    {
        return $this->hasMany(Album::className(), ['user_id' => 'id']);
    }
}
