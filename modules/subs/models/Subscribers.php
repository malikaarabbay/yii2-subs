<?php

namespace app\modules\subs\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "subscribers".
 *
 * @property int $id
 * @property int $event_id Событие
 * @property string $email Получатель
 * @property int|null $is_blocked Заблокирован
 * @property int $created_at Дата создания
 * @property int $updated_at Дата изменения
 */
class Subscribers extends ActiveRecord
{
    const EVENT_SIGNUP        = 0;
    const EVENT_VERIFICATION  = 1;
    const EVENT_LOGIN         = 2;
    const EVENT_EMAIL         = 3;
    const EVENT_LOGOUT        = 4;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscribers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id', 'email', 'is_blocked'], 'required', 'message' => 'Заполните поле {attribute}.'],
            [['event_id', 'is_blocked', 'created_at', 'updated_at'], 'integer'],
            ['email', 'email', 'message' => 'Неправильный формат электронной почты'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_id' => 'Событие',
            'email' => 'Получатель',
            'is_blocked' => 'Заблокирован',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата изменения',
        ];
    }

    /**
     * @return array
     */
    public static function getEventList()
    {
        return [
            self::EVENT_SIGNUP => 'Регистрация',
            self::EVENT_VERIFICATION => 'Верификация',
            self::EVENT_LOGIN => 'Вход',
            self::EVENT_EMAIL => 'Отправка сообщения',
            self::EVENT_LOGOUT => 'Выход',
        ];
    }

    /**
     * @return mixed
     */
    public function getEventValue()
    {
        return self::getEventList()[ $this->event_id ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }
}
