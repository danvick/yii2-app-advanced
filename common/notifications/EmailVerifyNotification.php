<?php

namespace common\notifications;

use common\models\User;
use tuyakhov\notifications\messages\MailMessage;
use tuyakhov\notifications\NotificationInterface;
use tuyakhov\notifications\NotificationTrait;
use Yii;
use yii\base\BaseObject;
use yii\base\InvalidConfigException;

class EmailVerifyNotification extends BaseObject implements NotificationInterface
{
    use NotificationTrait;

    public User $user;

    /**
     * Prepares notification for 'mail' channel
     * @return MailMessage
     * @throws InvalidConfigException
     */
    public function exportForMail(): MailMessage
    {
        return Yii::createObject([
            'class' => MailMessage::class,
            'view' => ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
            'viewData' => ['user' => $this->user],
            'from' => [Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'],
            'subject' => 'Account registration at ' . Yii::$app->name,
        ]);
    }

    /*
    // Prepares notification for 'database' channel
    public function exportForDatabase(): DatabaseMessage
    {
        return Yii::createObject([
            'class' => DatabaseMessage::class,
            'subject' => 'Subject',
            'body' => 'Message body',
            'data' => [
                'actionUrl' => ['href' => '/site/index', 'params' => [], 'label' => 'Pay Invoice'],
            ],
        ]);
    }*/

    /*
    // Prepares notification for 'fcm' channel
    public function exportForFcm(): Notification
    {
        return (new Fcm\Push\Notification())
            ->setTitle("Notification title")
            ->setBody("Notification body");
    }*/

    /** @inheritdoc */
    public function broadcastOn(): array
    {
        return ['mail'];
    }
}