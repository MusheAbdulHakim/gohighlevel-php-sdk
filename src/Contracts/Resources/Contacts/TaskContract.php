<?php

declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources\Contacts;

interface TaskContract
{
    /**
     * Get all Tasks
     *
     * @see https://highlevel.stoplight.io/docs/integrations/db572d519b209-get-all-tasks
     */
    public function list(string $contactId);

    /**
     * Create Contact
     *
     * @see https://highlevel.stoplight.io/docs/integrations/fa57d1470b87c-create-task
     */
    public function create(string $contactId, array $params);

    /**
     * Undocumented function
     *
     * @see https://highlevel.stoplight.io/docs/integrations/c4d36fb259656-get-task
     */
    public function get(string $contactId, string $taskId);

    /**
     * Update Task
     *
     * @see https://highlevel.stoplight.io/docs/integrations/82e1223e90ec9-update-task
     */
    public function update(string $contactId, string $taskId, array $params);

    /**
     * Delete Task
     *
     * @see https://highlevel.stoplight.io/docs/integrations/506ee1741ec7e-delete-task
     */
    public function delete(string $contactId, string $taskId);

    /**
     * Update Task Completed
     *
     * @see https://highlevel.stoplight.io/docs/integrations/b03d53971d208-update-task-completed
     */
    public function completed(string $contactId, string $taskId, bool $completed);
}
