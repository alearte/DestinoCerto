<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property integer $site_id
 * @property string $username
 * @property string $password
 * @property integer $isAdmin
 *
 * @property Site $site
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'site_id', 'username', 'password'], 'required'],
            [['id', 'site_id', 'isAdmin'], 'integer'],
            [['username'], 'string', 'max' => 45],
            [['password'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'site_id' => 'Site ID',
            'username' => 'Username',
            'password' => 'Password',
            'isAdmin' => 'Is Admin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSite()
    {
        return $this->hasOne(Site::className(), ['id' => 'site_id']);
    }
}
