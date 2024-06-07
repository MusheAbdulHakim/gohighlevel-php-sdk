<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel;

use MusheAbdulHakim\GoHighLevel\Contracts\ClientContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\BusinessContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\CompanyContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\ContactContract;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\Resources\Business;
use MusheAbdulHakim\GoHighLevel\Resources\Company;
use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Contact;

final class Client implements ClientContract
{
    /**
     * Creates a Client instance with the given API token.
     */
    public function __construct(private readonly TransporterContract $transporter)
    {
        // ..
    }

    public function businesses(): BusinessContract
    {
        return new Business($this->transporter);
    }

    public function companies(): CompanyContract
    {
        return new Company($this->transporter);
    }

    public function contacts(): ContactContract
    {
        return new Contact($this->transporter);
    }
}
