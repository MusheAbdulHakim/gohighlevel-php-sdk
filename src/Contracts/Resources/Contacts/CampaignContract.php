<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts;

interface CampaignContract
{
    /**
     * Add Contact to Campaign
     *
     * @see https://highlevel.stoplight.io/docs/integrations/ecf9b5b45deaf-add-contact-to-campaign
     */
    public function create(string $contactId, string $campaignId);

    /**
     * Add Contact to Campaign
     *
     * @see https://highlevel.stoplight.io/docs/integrations/ecf9b5b45deaf-add-contact-to-campaign
     */
    public function add(string $contactId, string $campaignId);

    /**
     * Remove Contact From Campaign
     *
     * @see https://highlevel.stoplight.io/docs/integrations/e88fc8bf2a781-remove-contact-from-campaign
     */
    public function removeContact(string $contactId, string $campaignId);

    /**
     * Remove Contact From Every Campaign
     *
     * @param  string  $campaignId
     *
     * @see https://highlevel.stoplight.io/docs/integrations/e88fc8bf2a781-remove-contact-from-campaign
     */
    public function removeContactFromAll(string $contactId);
}
