<?php
namespace app\models;
use Yii;
/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 *
 */
class Usuario extends \yii\db\ActiveRecord 
              implements \yii\web\IdentityInterface
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
            [['username', 'email', 'password'], 'required'],
            [['password'], 'integer'],
           [['username', 'email'], 'string', 'max' => 50],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Nome',
            'email' => 'E-mail',
            'password' => 'Senha',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return self::findOne([$id]);
    }
    
    public static function findUsername($username){
        return self::findOne(['username'=>$username]);
    }
    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }
    /**
     * @return string a chave de autenticação do usuário atual
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }
    /**
     * @param string $authKey
     * @return bool se a chave de autenticação do usuário atual for válida
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
    
    public static function findByUsername($username){
        return self::findOne(['username'=>$username]);
    }
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
}