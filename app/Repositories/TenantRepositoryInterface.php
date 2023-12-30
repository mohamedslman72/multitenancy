<?php

namespace App\Repositories;

interface TenantRepositoryInterface
{
    public function getUsersByTenantId($tenantId);
}
