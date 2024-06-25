<?php

declare(strict_types=1);

namespace Src\Resources\SocialPlanner;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\SocialPlanner\Google as GoogleSocialPlanner;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

class Google implements GoogleSocialPlanner
{
    use Transportable;

    public function oAuth(string $locationId, string $userId, array $params = []): array|string
    {
        $params['locationId'] = $locationId;
        $params['userId'] = $userId;
        $payload = Payload::get('social-media-posting/oauth/google/start', $params);

        return $this->transporter->requestObject($payload)->data();

    }

    public function businessLocations(string $accountId, string $locationId): array|string
    {
        $payload = Payload::get("social-media-posting/oauth/$locationId/google/locations/$accountId");

        return $this->transporter->requestObject($payload)->data();
    }

    public function setBusinessLocation(string $accountId, string $locationId, array $params = []): array|string
    {
        $payload = Payload::post("social-media-posting/oauth/$locationId/google/locations/$accountId", $params);

        return $this->transporter->requestObject($payload)->data();
    }
}
