<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel;

/**
 * @internal
 */
final class GoHighLevel
{

    public static function init(string $apiKey)
    {
        return self::factory()
                ->withApiKey($apiKey);
    }

    public static function client(string $apiKey, string $version): Client
    {
        return self::factory()
                ->withApiKey($apiKey)
                ->make();
    }


    /**
     * Creates a new factory instance to configure a custom Open AI Client
     */
    public static function factory(): Factory
    {
        return new Factory();
    }

}
