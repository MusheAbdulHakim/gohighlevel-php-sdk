<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel;

use MusheAbdulHakim\GoHighLevel\Contracts\Auth\OAuthContract;
use MusheAbdulHakim\GoHighLevel\Contracts\ClientContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\BusinessContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Calendars\CalendarContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Campaigns\CampaignContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\CompanyContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\ContactContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Conversations\ConversationContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Courses\CourseContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Forms\FormContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Funnels\FunnelContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Invoices\InvoiceContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Locations\LocationContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Media\LibraryContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\TriggerLinks\TriggerLinkContract;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\Resources\Auth\OAuth;
use MusheAbdulHakim\GoHighLevel\Resources\Business;
use MusheAbdulHakim\GoHighLevel\Resources\Calendars\Calendar;
use MusheAbdulHakim\GoHighLevel\Resources\Campaigns\Campaign;
use MusheAbdulHakim\GoHighLevel\Resources\Company;
use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Contact;
use MusheAbdulHakim\GoHighLevel\Resources\Conversations\Conversation;
use MusheAbdulHakim\GoHighLevel\Resources\Courses\Course;
use MusheAbdulHakim\GoHighLevel\Resources\Forms\Form;
use MusheAbdulHakim\GoHighLevel\Resources\Funnels\Funnel;
use MusheAbdulHakim\GoHighLevel\Resources\Invoices\Invoice;
use MusheAbdulHakim\GoHighLevel\Resources\Locations\Location;
use MusheAbdulHakim\GoHighLevel\Resources\Media\Library;
use MusheAbdulHakim\GoHighLevel\Resources\TriggerLinks\TriggerLink;

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

    public function calendars(): CalendarContract
    {
        return new Calendar($this->transporter);
    }

    public function campaigns(): CampaignContract
    {
        return new Campaign($this->transporter);
    }

    public function companies(): CompanyContract
    {
        return new Company($this->transporter);
    }

    public function contacts(): ContactContract
    {
        return new Contact($this->transporter);
    }

    public function conversations(): ConversationContract
    {
        return new Conversation($this->transporter);
    }

    public function courses(): CourseContract
    {
        return new Course($this->transporter);
    }

    public function forms(): FormContract
    {
        return new Form($this->transporter);
    }

    public function invoices(): InvoiceContract
    {
        return new Invoice($this->transporter);
    }

    public function triggerLinks(): TriggerLinkContract
    {
        return new TriggerLink($this->transporter);
    }

    public function location(): LocationContract
    {
        return new Location($this->transporter);
    }

    public function media(): LibraryContract
    {
        return new Library($this->transporter);
    }

    public function funnel(): FunnelContract
    {
        return new Funnel($this->transporter);
    }

    public function oAuth(): OAuthContract
    {
        return new OAuth($this->transporter);
    }
}
