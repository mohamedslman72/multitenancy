<?php

namespace App\Repositories;


use App\Models\CustomTenantModel;
use App\Models\User;
use App\Traits\ModelGetterTrait;
use Illuminate\Database\Eloquent\Collection;

class TenantRepository implements TenantRepositoryInterface
{
    use ModelGetterTrait;
    protected $modelClass = CustomTenantModel::class;

    public function getUsersByTenantId($tenantId) :Collection
    {
        return $this->modelClass::findOrFail($tenantId)->users;
    }
    public function createTenant($data) {
        return $this->modelClass::create($data);
    }
    public function get()
    {
       return $this->modelClass::all();
    }


}
