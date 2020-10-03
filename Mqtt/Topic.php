<?php

declare(strict_types=1);

namespace AmbientLink\SDK\Mqtt;

final class Topic
{
    private string $base;
    private string $friendlyName;

    public function __construct(string $base, string $friendlyName)
    {
        $this->base = $base;
        $this->friendlyName = $friendlyName;
    }

    public static function with(string $base, string $friendlyName): self
    {
        return new self($base, $friendlyName);
    }

    public function equals(self $topic): bool
    {
        return (string) $this === (string) $topic;
    }

    public static function fromString(string $topic): self
    {
        $topicParts = explode('/', $topic);

        if (2 !== \count($topicParts)) {
            throw new \InvalidArgumentException(sprintf('Topic "%s" might be invalid.', $topic));
        }

        return new self($topicParts[0], $topicParts[1]);
    }

    public function toSetTopic(): string
    {
        return sprintf('%s/%s/set', $this->base, $this->friendlyName);
    }

    public function toUpdateTopic(): string
    {
        return sprintf('%s/bridge/ota_update/update', $this->base);
    }

    public function toFriendlyName(): string
    {
        return $this->friendlyName;
    }

    public function __toString(): string
    {
        return sprintf('%s/%s', $this->base, $this->friendlyName);
    }
}
