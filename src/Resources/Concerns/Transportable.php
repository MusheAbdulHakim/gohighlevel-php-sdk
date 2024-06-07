<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Concerns;

use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;

trait Transportable
{
    public function __construct(private readonly TransporterContract $transporter)
    {
        // ..
    }
}
