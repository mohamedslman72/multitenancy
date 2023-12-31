<?php

namespace App\Repositories;

interface TenantRepositoryInterface
{
    /**
     * @param $tenantId
     * @return mixed
     */
    public function getUsersByTenantId($tenantId);
}
