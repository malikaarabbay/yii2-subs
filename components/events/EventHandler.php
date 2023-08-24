<?php

namespace app\components\events;

use yii\base\Component;
use yii\base\Event;
use Yii;
use app\modules\subs\models\Subscribers;

class EventHandler extends Component
{
    const EVENT_SIGNUP        = 'signup';
    const EVENT_VERIFICATION  = 'verification';
    const EVENT_LOGIN         = 'login';
    const EVENT_EMAIL         = 'email';
    const EVENT_LOGOUT        = 'logout';

    /**
     * Отправляет подписчикам уведомления при входа в систему пользователя
     * @param Event $event
     * @return bool
     */
    public static function login(Event $event)
    {
        $subscribers = Subscribers::getSubscribersByEventId($event->data['event_id']);

        $messages = [];
        foreach ($subscribers as $subscriber) {
            $messages[] = Yii::$app->mailer->compose()
                ->setTo($subscriber->email)
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setSubject('Вход в систему ' . Yii::$app->name)
                ->setTextBody('Пользователь ' . Yii::$app->user->identity->username . ' успешно вошел в систему ' . Yii::$app->name);
        }
        return Yii::$app->mailer->sendMultiple($messages);
    }
}