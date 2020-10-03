<?php

declare(strict_types=1);

namespace AmbientLink\SDK;

use AmbientLink\SDK\Mqtt\Topic;
use App\Infrastructure\AmbientLink\SDK\Mqtt\MqttAdapter;
use PhpMqtt\Client\ConnectionSettings;
use PhpMqtt\Client\MQTTClient;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

final class MqttEuConnection
{
    private const CLIENT_ID = 'ability client #%s version:'.AmbientLink::VERSION;

    /** @var ConnectionSettings */
    private $connectionSettings;

    /** @var string */
    private $token;

    public function __construct(ConnectionSettings $connectionSettings, string $token)
    {
        $this->connectionSettings = $connectionSettings;
        $this->token = $token;
    }

    public function publish(string $message): void
    {
        $this->connect()->publish($this->getTopic(), $message);
    }

    public function subscribe(callable $callback): void
    {
        $this->connect()->subscribe($this->getTopic(), $callback);
    }

    private function connect(LoggerInterface $logger = null): MqttAdapter
    {
        return new MqttAdapter(
            new MQTTClient('mqtt.eu', 1883, $this->getClientId()),
            $this->connectionSettings,
            null,
            null,
            $logger ?? new NullLogger()
        );
    }

    private function getTopic(): Topic
    {
        return Topic::with('ability-queue', $this->token);
    }

    private function getClientId(): string
    {
        return sprintf(self::CLIENT_ID, AmbientLink::VERSION);
    }
}
