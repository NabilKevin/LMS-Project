<?php

namespace App;

enum CourseStatusFilter: string
{
    case All = 'all';
    case Completed = 'completed';
    case NotCompleted = 'not completed';

    public static function fromRequest(string $value): self
    {
        return self::tryFrom($value)
            ?? throw new \InvalidArgumentException("Status filter tidak valid: {$value}");
    }
}
