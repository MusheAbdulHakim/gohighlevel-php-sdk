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
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\CustomMenus\CustomMenuContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Forms\FormContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Funnels\FunnelContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Invoices\InvoiceContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Locations\LocationContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\MediaLibrary\MediaLibraryContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Opportunities\OpportunityContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Payments\PaymentContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Products\ProductContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\SaaS\SaasContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Snapshots\SnapshotsContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Surveys\SurveysContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\TriggerLinks\TriggerLinkContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Users\UsersContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Workflows\WorkflowsContract;
use MusheAbdulHakim\GoHighLevel\Contracts\TransporterContract;
use MusheAbdulHakim\GoHighLevel\Resources\Auth\OAuth;
use MusheAbdulHakim\GoHighLevel\Resources\Business;
use MusheAbdulHakim\GoHighLevel\Resources\Calendars\Calendar;
use MusheAbdulHakim\GoHighLevel\Resources\Campaigns\Campaign;
use MusheAbdulHakim\GoHighLevel\Resources\Company;
use MusheAbdulHakim\GoHighLevel\Resources\Contacts\Contact;
use MusheAbdulHakim\GoHighLevel\Resources\Conversations\Conversation;
use MusheAbdulHakim\GoHighLevel\Resources\Courses\Course;
use MusheAbdulHakim\GoHighLevel\Resources\CustomMenus\CustomMenu;
use MusheAbdulHakim\GoHighLevel\Resources\Forms\Form;
use MusheAbdulHakim\GoHighLevel\Resources\Funnels\Funnel;
use MusheAbdulHakim\GoHighLevel\Resources\Invoices\Invoice;
use MusheAbdulHakim\GoHighLevel\Resources\Locations\Location;
use MusheAbdulHakim\GoHighLevel\Resources\MediaLibrary\MediaLibrary;
use MusheAbdulHakim\GoHighLevel\Resources\Opportunities\Opportunity;
use MusheAbdulHakim\GoHighLevel\Resources\Payments\Payment;
use MusheAbdulHakim\GoHighLevel\Resources\Products\Product;
use MusheAbdulHakim\GoHighLevel\Resources\SaaS\Saas;
use MusheAbdulHakim\GoHighLevel\Resources\Snapshots\Snapshot;
use MusheAbdulHakim\GoHighLevel\Resources\Surveys\Survey;
use MusheAbdulHakim\GoHighLevel\Resources\TriggerLinks\TriggerLink;
use MusheAbdulHakim\GoHighLevel\Resources\Users\User;
use MusheAbdulHakim\GoHighLevel\Resources\Workflows\Workflow;

final readonly class Client implements ClientContract
{
    /**
     * Creates a Client instance with the given API token.
     */
    public function __construct(private TransporterContract $transporter)
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

    public function customMenus(): CustomMenuContract
    {
        return new CustomMenu($this->transporter);
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

    public function mediaLibrary(): MediaLibraryContract
    {
        return new MediaLibrary($this->transporter);
    }

    public function funnel(): FunnelContract
    {
        return new Funnel($this->transporter);
    }

    public function opportunity(): OpportunityContract
    {
        return new Opportunity($this->transporter);
    }

    public function payments(): PaymentContract
    {
        return new Payment($this->transporter);
    }

    public function products(): ProductContract
    {
        return new Product($this->transporter);
    }

    public function saas(): SaasContract
    {
        return new Saas($this->transporter);
    }

    public function snapshot(): SnapshotsContract
    {
        return new Snapshot($this->transporter);
    }

    public function survey(): SurveysContract
    {
        return new Survey($this->transporter);
    }

    public function user(): UsersContract
    {
        return new User($this->transporter);
    }

    public function workflow(): WorkflowsContract
    {
        return new Workflow($this->transporter);
    }

    public function oAuth(): OAuthContract
    {
        return new OAuth($this->transporter);
    }
}
