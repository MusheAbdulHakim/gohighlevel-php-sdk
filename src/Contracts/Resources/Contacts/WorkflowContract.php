<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts;

interface WorkflowContract
{
    /**
     * Add Contact to Workflow
     *
     *
     * @see https://highlevel.stoplight.io/docs/integrations/fe0f421553a9e-add-contact-to-workflow
     */
    public function create(string $contactId, string $workflowId, string $eventStartTime);

    /**
     * Add Contact to Workflow
     *
     * @see https://highlevel.stoplight.io/docs/integrations/fe0f421553a9e-add-contact-to-workflow
     */
    public function add(string $contactId, string $workflowId, string $eventStartTime);

    /**
     * Delete Contact to Workflow
     *
     *
     * @see https://highlevel.stoplight.io/docs/integrations/86cd9978f66ff-delete-contact-to-workflow
     */
    public function delete(string $contactId, string $workflowId);
}
