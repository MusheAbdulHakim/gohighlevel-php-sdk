<?php
declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Responses\Meta;


final class GHLMetaInformation
{
    /**
     */
    public static function from(array $attributes): self
    {
        return new self(
            $attributes['total'],
            $attributes['nextPageUrl'],
            $attributes['startAfterId'],
            $attributes['startAfter'],
            $attributes['currentPage'],
            $attributes['nextPage'],
            $attributes['prevPage'],
        );
    }
}
