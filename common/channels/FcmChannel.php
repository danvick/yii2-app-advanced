<?php
namespace common\channels;

use Fcm\FcmClient;
use Fcm\Push\Notification;
use tuyakhov\notifications\channels\ChannelInterface;
use tuyakhov\notifications\NotifiableInterface;
use tuyakhov\notifications\NotificationInterface;
use yii\base\Component;

/**
 *
 * @property-read FcmClient $client
 */
class FcmChannel extends Component implements ChannelInterface
{
    public string $serverKey;
    public string $senderId;

    /**
     * @inheritdoc
     */
    public function send(NotifiableInterface $recipient, NotificationInterface $notification)
    {
        /** @var $message Notification */
        $message = $notification->exportFor('fcm');
        $message->addRecipient($recipient->routeNotificationFor('fcm'));
        return $this->client->send($message);
    }

    /**
     * @return FcmClient
     */
    public function getClient(): FcmClient
    {
        return FcmClient::create($this->serverKey, $this->senderId);
    }
}
