<?php

declare(strict_types=1);

namespace AmbientLink\SDK\Mqtt;

use AmbientLink\SDK\Mqtt\Topic;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\SerializerInterface;

final class MqttDataTransformer
{
    /** @var SerializerInterface */
    private $serializer;

    /** @var LoggerInterface */
    private $logger;

    /** @var array */
    private $topicToTypeMapping;

    public function __construct(
        SerializerInterface $serializer,
        LoggerInterface $logger,
        array $topicToTypeMapping
    ) {
        $this->serializer = $serializer;
        $this->topicToTypeMapping = $topicToTypeMapping;
        $this->logger = $logger;
    }

    public function transform(string $topic, string $message): ?object
    {
        $className = $this->mapTopicToType($topic);

        try {
            return $this->serializer->deserialize($message, $className, 'json', ['topic' => Topic::fromString($topic)]);
        } catch (\RuntimeException $exception) {
            $this->logger->critical(
                sprintf('Something went wrong with deserialize of topic "%s"', $topic),
                ['exception' => $exception]
            );

            return null;
        }
    }

    private function mapTopicToType(string $topic): string
    {
        foreach ($this->topicToTypeMapping as $topicSuffix => $type) {
            if (false !== strpos($topic, $topicSuffix)) {
                return $type;
            }
        }

        throw MqttTopicToTypeException::typeNotFound($topic);
    }
}
