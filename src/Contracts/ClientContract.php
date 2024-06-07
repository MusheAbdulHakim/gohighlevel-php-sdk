<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\BusinessContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\CompanyContract;

interface ClientContract
{
    public function businesses(): BusinessContract;

    public function companies(): CompanyContract;
}
