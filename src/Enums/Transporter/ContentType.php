<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Enums\Transporter;

/**
 * @internal
 */
enum ContentType: string
{
    case JSON       = 'application/json';
    case MULTIPART  = 'multipart/form-data';
    case TEXT_PLAIN = 'text/plain';
    case URL_ENCODE = 'application/x-www-form-urlencoded';
}
