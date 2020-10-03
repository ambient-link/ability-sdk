<?php

declare(strict_types=1);

namespace App\Infrastructure\AmbientLink\SDK\Mqtt;

final class MqttTopicToTypeException extends \DomainException
{
    public static function typeNotFound(string $topic): self
    {
        return new self(sprintf('Type for Topic "%s" not found.', $topic));
    }
}
