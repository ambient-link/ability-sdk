<?php

declare(strict_types=1);

namespace AmbientLink\SDK\Mqtt;

use AmbientLink\SDK\Mqtt\Topic;
use PhpMqtt\Client\ConnectionSettings;
use PhpMqtt\Client\Contracts\MQTTClient;
use PhpMqtt\Client\Exceptions\ConnectingToBrokerFailedException;
use PhpMqtt\Client\Exceptions\DataTransferException;
use PhpMqtt\Client\Exceptions\UnexpectedAcknowledgementException;
use Psr\Log\LoggerInterface;

final class MqttAdapter
{
    /** @var MQTTClient */
    private $client;

    /** @var ConnectionSettings */
    private $connectionSettings;

    /** @var string|null */
    private $username;

    /** @var string|null */
    private $password;

    /** @var LoggerInterface */
    private $logger;

    public function __construct(
        MQTTClient $client,
        ConnectionSettings $connectionSettings,
        ?string $username,
        ?string $password,
        LoggerInterface $logger
    ) {
        $this->client = $client;
        $this->connectionSettings = $connectionSettings;
        $this->username = $username;
        $this->password = $password;
        $this->logger = $logger;
    }

    public function subscribe(Topic $topic, callable $callback): void
    {
        $this->connect();

        try {
            $this->client->subscribe((string)$topic, $callback);
        } catch (DataTransferException $exception) {
            $this->logger->alert(sprintf('Subscribing on "%s" failed.', $topic), ['exception' => $exception]);
        }

        try {
            $this->client->loop(true);
        } catch (DataTransferException $exception) {
            $this->logger->alert(sprintf('Loop failed "%s" failed.', $topic), ['exception' => $exception]);
        } catch (UnexpectedAcknowledgementException $exception) {
            $this->logger->alert(sprintf('Subscribing on "%s" failed.', $topic), ['exception' => $exception]);
        }
    }

    public function update(Topic $topic): void
    {
        $this->connect();

        try {
            $this->client->publish($topic->toUpdateTopic(), $topic->toFriendlyName());
        } catch (DataTransferException $exception) {
            $this->logger->alert(
                sprintf('Publishing failed on Broker "%s"', $this->client->getHost()),
                ['exception' => $exception]
            );
        }
    }

    public function publish(Topic $topic, string $message): void
    {
        $this->connect();

        try {
            $this->client->publish($topic->toSetTopic(), $message);
        } catch (DataTransferException $exception) {
            $this->logger->alert(
                sprintf('Publishing failed on Broker "%s"', $this->client->getHost()),
                ['exception' => $exception]
            );
        }
    }

    public function __destruct()
    {
        $this->close();
    }

    private function close(): void
    {
        try {
            $this->client->close();
        } catch (DataTransferException $exception) {
            $this->logger->alert(
                sprintf('Closing failed on Broker "%s"', $this->client->getHost()),
                ['exception' => $exception]
            );
        }
    }

    private function connect(): void
    {
        try {
            $this->client->connect($this->username, $this->password, $this->connectionSettings);
        } catch (ConnectingToBrokerFailedException $exception) {
            $this->logger->critical(
                sprintf('Connection to Broker "%s" failed', $this->client->getHost()),
                ['exception' => $exception]
            );
        }
    }
}
