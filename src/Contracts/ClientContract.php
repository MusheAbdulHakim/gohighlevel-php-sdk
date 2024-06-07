<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\CompanyContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\BusinessContract;

interface ClientContract {

    public function businesses(): BusinessContract;

    public function companies(): CompanyContract;

}
