<?php
declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Resources\Contacts;

use MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts\ContactContract;
use MusheAbdulHakim\GoHighLevel\Resources\Concerns\Transportable;
use MusheAbdulHakim\GoHighLevel\ValueObjects\Transporter\Payload;

final class Contact implements ContactContract
{
    use Transportable;

    /**
     * Get Contact by contactId
     *
     * @param string $contactId
     * @see https://highlevel.stoplight.io/docs/integrations/00c5ff21f0030-get-contact
     */
    public function get(string $contactId){
        $payload = Payload::get("contacts/{$contactId}");
        return $this->transporter->requestObject($payload)->get('contact');
    }

    /**
     * Update a Contact
     *
     * @param string $contactId
     * @param array $params
     * @see https://highlevel.stoplight.io/docs/integrations/9ce5a739d4fb9-update-contact
     */
    public function update(string $contactId, array $params)
    {
        $payload = Payload::put("contacts/",$contactId,$params);
        return $this->transporter->requestObject($payload)->data();
    }

    /**
     * Delete a Contact
     *
     * @param string $contactId
     * @see https://highlevel.stoplight.io/docs/integrations/28ab84e9522b6-delete-contact
     */
    public function delete(string $contactId)
    {
        $payload = Payload::delete("contacts/",$contactId);
        return $this->transporter->requestObject($payload);
    }

    /**
     * Upsert a contact
     *
     * @param array $params
     * @see https://highlevel.stoplight.io/docs/integrations/f71bbdd88f028-upsert-contact
     */
    public function upsert(array $params)
    {
        $payload = Payload::create("contacts/upsert",$params);
        return $this->transporter->requestObject($payload);
    }

    /**
     * Get Contacts By BusinessId
     *
     * @param string $businessId
     * @see https://highlevel.stoplight.io/docs/integrations/8efc6d5a99417-get-contacts-by-business-id
     */
    public function byBusiness(string $businessId)
    {
        $payload = Payload::get("contacts/business/businessId",[
            'locationId' => $businessId
        ]);
        return $this->transporter->requestObject($payload)->get('contacts');
    }

    /**
     * Create Contact
     *
     * @param array $params
     * @see https://highlevel.stoplight.io/docs/integrations/4c8362223c17b-create-contact
     */
    public function create(array $params)
    {
        $payload = Payload::create("contacts/", $params);
        return $this->transporter->requestObject($payload);
    }

    /**
     * Get Contacts
     *
     * @param string $locationId
     * @see https://highlevel.stoplight.io/docs/integrations/ab55933a57f6f-get-contacts
     */
    public function list(string $locationId)
    {
        $payload = Payload::get("contacts/",[
            'locationId' => $locationId
        ]);
        return $this->transporter
                ->requestObject($payload)
                ->get('contacts');
    }
}
