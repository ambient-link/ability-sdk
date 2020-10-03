<?php

declare(strict_types=1);

namespace AmbientLink\SDK;

use AmbientLink\SDK\Mqtt\Topic;
use App\Infrastructure\AmbientLink\SDK\Mqtt\MqttAdapter;
use PhpMqtt\Client\ConnectionSettings;
use PhpMqtt\Client\Contracts\MQTTClient;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

final class SmartMoneyConnection
{
    /** @var ConnectionSettings */
    private $connectionSettings;

    /** @var string|null */
    private $username;

    /** @var string|null */
    private $password;

    public function __construct(
        ConnectionSettings $connectionSettings,
        ?string $username,
        ?string $password
    ) {
        $this->connectionSettings = $connectionSettings;
        $this->username = $username;
        $this->password = $password;
    }

    public function publish(MQTTClient $client, Topic $topic, string $message): void
    {
        $this->connect($client)->publish($topic, $message);
    }

    public function subscribe(MQTTClient $client, Topic $topic, callable $callback): void
    {
        $this->connect($client)->subscribe($topic, $callback);
    }

    private function connect(MqttClient $client, LoggerInterface $logger = null): MqttAdapter
    {
        return new MqttAdapter(
            $client,
            $this->connectionSettings,
            $this->username,
            $this->password,
            $logger ?? new NullLogger()
        );
    }
}
