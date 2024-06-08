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
     * @see https://highlevel.stoplight.io/docs/integrations/00c5ff21f0030-get-contact
     */
    public function get(string $contactId);

    /**
     * Update Contact
     *
     * @see https://highlevel.stoplight.io/docs/integrations/9ce5a739d4fb9-update-contact
     */
    public function update(string $contactId, array $params);

    /**
     * Delete Contact
     *
     * @see https://highlevel.stoplight.io/docs/integrations/28ab84e9522b6-delete-contact
     */
    public function delete(string $contactId);

    /**
     * Upsert Contact
     *
     * If Allow Duplicate Contact is disabled under Settings, the global unique identifier will be used for de-duplication. If the setting is enabled, a new contact will get created with the shared details.
     *
     * @see https://highlevel.stoplight.io/docs/integrations/f71bbdd88f028-upsert-contact
     */
    public function upsert(array $params);

    /**
     * Get Contacts By BusinessId
     *
     * @see https://highlevel.stoplight.io/docs/integrations/8efc6d5a99417-get-contacts-by-business-id
     */
    public function byBusiness(string $businessId);

    /**
     * Create Contact
     *
     * @see https://highlevel.stoplight.io/docs/integrations/4c8362223c17b-create-contact
     */
    public function create(array $params);

    /**
     * Get Contacts
     *
     * @see https://highlevel.stoplight.io/docs/integrations/ab55933a57f6f-get-contacts
     */
    public function list(string $locationId);

    public function tasks(): TaskContract;

    public function appointments(): AppointmentContract;

    public function tags(): TagContract;

    public function notes(): NoteContract;

    public function campaign(): CampaignContract;

    public function workflow(): WorkflowContract;

    public function bulk(string $locationId, array $ids, string $businessId): array;

    public function search(): SearchContract;

    public function followers(): FollowerContract;
}
