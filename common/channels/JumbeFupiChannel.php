<?php
namespace common\channels;

use danvick\jumbefupi\JumbefupiGateway;
use danvick\jumbefupi\TextMessage;
use tuyakhov\notifications\channels\ChannelInterface;
use tuyakhov\notifications\NotifiableInterface;
use tuyakhov\notifications\NotificationInterface;
use Yii;
use yii\base\Component;

class JumbeFupiChannel extends Component implements ChannelInterface
{
    public string $jumbefupiComponent = 'jumbefupi';

    /**
     * @inheritdoc
     */
    public function send(NotifiableInterface $recipient, NotificationInterface $notification)
    {
        Yii::info("Sending SMS message: '" . $notification->exportFor('sms')->text . "' to " . $recipient->routeNotificationFor('sms'));
        // Yii::$app->jumbefupi->send(new TextMessage(['recipients' => , 'text' => $text]))
        return Yii::$app->get($this->jumbefupiComponent)->send(new TextMessage(['recipients' => $recipient->routeNotificationFor('sms'), 'text' => $notification->exportFor('sms')->text]));
    }
}