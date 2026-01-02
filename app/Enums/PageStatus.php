<?php

namespace App\Enums;

enum PageStatus: string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case ARCHIVED = 'archived';

    /**
     * Get all status values as an array.
     *
     * @return array<string>
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Get all status labels.
     *
     * @return array<string, string>
     */
    public static function labels(): array
    {
        return [
            self::DRAFT->value => 'Draft',
            self::PUBLISHED->value => 'Published',
            self::ARCHIVED->value => 'Archived',
        ];
    }

    /**
     * Get the label for the current status.
     */
    public function label(): string
    {
        return self::labels()[$this->value] ?? $this->value;
    }
}
