<?php
declare(strict_types=1);

namespace MusheAbdulHakim\GoHighLevel\Contracts\Resources;


interface CompanyContract
{
    public function get(string $companyId);
}
