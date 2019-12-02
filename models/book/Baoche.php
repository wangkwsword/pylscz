<?php

namespace app\models\book;

use Yii;

/**
 * This is the model class for table "baoche".
 *
 * @property integer $id
 * @property string $fromaddress
 * @property string $toaddress
 * @property string $chuxingtime
 * @property integer $chengren
 * @property integer $ertong
 * @property string $mobile
 * @property string $nickname
 * @property string $created_time
 * @property string $note
 * @property integer $baoche_id
 * @property integer $member_id
 */
class Baoche extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'baoche';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fromaddress', 'toaddress', 'chuxingtime', 'chengren', 'ertong', 'mobile', 'nickname', 'note', 'baoche_id', 'member_id'], 'required'],
            [['chengren', 'ertong', 'baoche_id', 'member_id'], 'integer'],
            [['created_time'], 'safe'],
            [['fromaddress', 'toaddress'], 'string', 'max' => 200],
            [['chuxingtime'], 'string', 'max' => 100],
            [['mobile', 'nickname'], 'string', 'max' => 50],
            [['note'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fromaddress' => 'Fromaddress',
            'toaddress' => 'Toaddress',
            'chuxingtime' => 'Chuxingtime',
            'chengren' => 'Chengren',
            'ertong' => 'Ertong',
            'mobile' => 'Mobile',
            'nickname' => 'Nickname',
            'created_time' => 'Created Time',
            'note' => 'Note',
            'baoche_id' => 'Baoche ID',
            'member_id' => 'Member ID',
        ];
    }
}
