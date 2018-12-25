<?php
/**
 * Created by PhpStorm.
 * User: Drunk penguin
 * Date: 25.12.2018
 * Time: 18:30
 */


namespace common\models;

use Yii;

/**
 * This is the model class for table "data".
 *
 * @property int $id
 * @property int $id_user
 * @property int $created_at
 * @property int $n
 * @property string $str
 * @property int $result
 *
 * @property User $user
 */
class DataActiveRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'created_at', 'n', 'str', 'result'], 'required'],
            [['id_user', 'created_at', 'n', 'result'], 'integer'],
            [['str'], 'string'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'created_at' => 'Created At',
            'n' => 'N',
            'str' => 'Str',
            'result' => 'Result',
        ];
    }
    public function setAll($n,$str,$result,$id_user){
        $this->id_user=$id_user;
        $this->str=$str;
        $this->n=$n;
        $this->result=$result;
        $this->created_at=strtotime(date("H:i d.m.Y"));

    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
