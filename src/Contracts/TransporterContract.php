<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts;

use MusheAbdulHakim\GoHighLevel\Exceptions\ErrorException;
use MusheAbdulHakim\GoHighLevel\Exceptions\TransporterException;
use MusheAbdulHakim\GoHighLevel\Exceptions\UnserializableResponse;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Response;
use Psr\Http\Message\ResponseInterface;

interface TransporterContract
{
    /**
     * Sends a request to a server.
     *
     *
     * @throws ErrorException|UnserializableResponse|TransporterException
     */
    public function requestObject(Payload $payload): Response;

    /**
     * Sends a content request to a server.
     *
     * @throws ErrorException|TransporterException
     */
    public function requestContent(Payload $payload): string;

    /**
     * Sends a stream request to a server.
     **
     * @throws ErrorException
     */
    public function requestStream(Payload $payload): ResponseInterface;
}
