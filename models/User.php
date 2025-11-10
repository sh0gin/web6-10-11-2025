<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $fullname
 * @property string $email
 * @property string $login
 * @property string $phone
 * @property string $password
 * @property string $authKey
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $passwordRepeat;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullname', 'email', 'login', 'phone', 'password'], 'required'],
            [['fullname', 'email', 'login', 'phone', 'password', 'passwordRepeat'], 'string', 'max' => 255],
            ['login', 'unique'],
            ['email', 'email'],
            ['passwordRepeat',  'compare', 'compareAttribute' => 'password'],
            ['password', 'string', 'min' => 6]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'ФИО',
            'email' => 'Почта',
            'login' => 'Логин',
            'phone' => 'Телефон',
            'password' => 'Пароль',
            'passwordRepeat' => 'Повторите пароль',
            'authKey' => 'Auth Key',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public static function findByUsername($login)
    {
        return User::findOne(['login' => $login]);
    }

    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

}
