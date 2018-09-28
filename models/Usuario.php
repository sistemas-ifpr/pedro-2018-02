<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property string $id
 * @property string $nome
 * @property string $username
 * @property string $password
 * @property string $authKey
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'username', 'password', 'authKey'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
        ];
    }
    
     public function getAuthKey()
    {
        return $this->authKey;
    }

    public function getId() {
        return $this->id;
    }

    public function validateAuthKey($authKey): bool {
        return $this->authKey === $authKey;
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null){
        throw new \yii\base\NotSupportedException();
    }
    
    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }
    
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
