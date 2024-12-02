<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts;

/**
 * Contacts Api
 *
 * @see https://highlevel.stoplight.io/docs/integrations/e957726e8625d-contacts-api
 */
interface ContactContract
{
    /**
     * Get Contact
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/00c5ff21f0030-get-contact
     */
    public function get(string $contactId): array|string;

    /**
     * Update Contact
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/9ce5a739d4fb9-update-contact
     */
    public function update(string $contactId, array $params): array|string;

    /**
     * Delete Contact
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/28ab84e9522b6-delete-contact
     */
    public function delete(string $contactId): array|string;

    /**
     * Upsert Contact
     *
     * If Allow Duplicate Contact is disabled under Settings, the global unique identifier will be used for de-duplication. If the setting is enabled, a new contact will get created with the shared details.
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/f71bbdd88f028-upsert-contact
     */
    public function upsert(array $params): array|string;

    /**
     * Get Contacts By BusinessId
     *
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/8efc6d5a99417-get-contacts-by-business-id
     */
    public function byBusiness(string $businessId): array|string;

    /**
     * Create Contact
     *
     *
     * @param  array<mixed>  $params
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/4c8362223c17b-create-contact
     */
    public function create(array $params): array|string;

    /**
     * Get Contacts
     *
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/ab55933a57f6f-get-contacts
     */
    public function list(string $locationId): array|string;

    /**
     * Contact Tasks
     */
    public function tasks(): TaskContract;

    /**
     * Contact Appointments
     */
    public function appointments(): AppointmentContract;

    /**
     * Contact Tags
     */
    public function tags(): TagContract;

    /**
     * Contact Notes
     */
    public function notes(): NoteContract;

    /**
     * Contact Campaign
     */
    public function campaign(): CampaignContract;

    /**
     * Contact Workflow
     */
    public function workflow(): WorkflowContract;

    /**
     * Add/Remove Contacts From Business
     *
     * @param  array<string>  $ids
     * @return array<mixed>|string
     *
     * @see https://highlevel.stoplight.io/docs/integrations/c37a9d47b1f0c-add-remove-contacts-from-business
     */
    public function bulk(string $locationId, array $ids, string $businessId): array|string;

    /**
     * Search Contacts
     */
    public function search(): SearchContract;

    /**
     * Contact Followers
     */
    public function followers(): FollowerContract;
}
