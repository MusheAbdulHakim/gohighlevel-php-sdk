<?php

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Calendars\CalendarContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Campaigns\CampaignContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\CompanyContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\ContactContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Conversations\ConversationContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Courses\CourseContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Forms\FormContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Invoices\InvoiceContract;
use MusheAbdulHakim\GoHighLevel\GoHighLevel;
use MusheAbdulHakim\GoHighLevel\Resources\Business;
use MusheAbdulHakim\GoHighLevel\Contracts\Auth\OAuthContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Locations\LocationContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\MediaLibrary\MediaLibraryContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Payments\PaymentContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\TriggerLinks\TriggerLinkContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Funnels\FunnelContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Opportunities\OpportunityContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Products\ProductContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\SaaS\SaasContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Snapshots\SnapshotsContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Surveys\SurveysContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Users\UsersContract;
use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Workflows\WorkflowsContract;

beforeEach(function () {
    $this->client = GoHighLevel::client('foo');
});

test('has businesses', function () {
    $business = $this->client->businesses();
    expect($business)->toBeInstanceOf(Business::class);
});


test('has calendars', function () {
    expect($this->client->calendars())->toBeInstanceOf(CalendarContract::class);
});

test('has campaigns', function () {
    expect($this->client->campaigns())->toBeInstanceOf(CampaignContract::class);
});

test('has companies', function () {
    expect($this->client->companies())->toBeInstanceOf(CompanyContract::class);
});

test('has contacts', function () {
    expect($this->client->contacts())->toBeInstanceOf(ContactContract::class);
});

test('has conversations', function () {
    expect($this->client->conversations())->toBeInstanceOf(ConversationContract::class);
});

test('has courses', function () {
    expect($this->client->courses())->toBeInstanceOf(CourseContract::class);
});


test('has forms', function () {
    expect($this->client->forms())->toBeInstanceOf(FormContract::class);
});

test('has invoices', function () {
    expect($this->client->invoices())->toBeInstanceOf(InvoiceContract::class);
});

test('has trigger links', function () {
    expect($this->client->triggerLinks())->toBeInstanceOf(TriggerLinkContract::class);
});

test('has location', function () {
    expect($this->client->location())->toBeInstanceOf(LocationContract::class);
});

test('has media library', function () {
    expect($this->client->mediaLibrary())->toBeInstanceOf(MediaLibraryContract::class);
});

test('has payments', function () {
    expect($this->client->payments())->toBeInstanceOf(PaymentContract::class);
});

test('has oauth', function () {
    expect($this->client->oAuth())->toBeInstanceOf(OAuthContract::class);
});

test('has funnel', function () {
    expect($this->client->funnel())->toBeInstanceOf(FunnelContract::class);
});

test('has opportunity', function () {
    expect($this->client->opportunity())->toBeInstanceOf(OpportunityContract::class);
});

test('has products', function () {
    expect($this->client->products())->toBeInstanceOf(ProductContract::class);
});

test('has saas', function () {
    expect($this->client->saas())->toBeInstanceOf(SaasContract::class);
});

test('has snapshot', function () {
    expect($this->client->snapshot())->toBeInstanceOf(SnapshotsContract::class);
});

test('has survey', function () {
    expect($this->client->survey())->toBeInstanceOf(SurveysContract::class);
});

test('has user', function () {
    expect($this->client->user())->toBeInstanceOf(UsersContract::class);
});

test('has workflow', function () {
    expect($this->client->workflow())->toBeInstanceOf(WorkflowsContract::class);
});
