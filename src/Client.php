<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel;

use MusheAbdulHakim\GoHighLevel\Contracts\ClientContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\BusinessContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\CompanyContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\AppointmentContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\ContactContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\NoteContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\TagContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\TaskContract;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\Resources\Business;
use MusheAbdulHakim\GoHighLevel\Resources\Company;
use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Appointment;
use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Contact;
use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Note;
use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Tag;
use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Task;

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

    public function tasks(): TaskContract
    {
        return new Task($this->transporter);
    }

    public function appointments(): AppointmentContract
    {
        return new Appointment($this->transporter);
    }

    public function tags(): TagContract
    {
        return new Tag($this->transporter);
    }

    public function notes(): NoteContract
    {
        return new Note($this->transporter);
    }
}
