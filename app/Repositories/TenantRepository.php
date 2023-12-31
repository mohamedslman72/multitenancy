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

    /**
     * @param $tenantId
     * @return Collection
     */
    public function getUsersByTenantId($tenantId) :Collection
    {
        return $this->modelClass::findOrFail($tenantId)->users;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function createTenant($data) {
        return $this->modelClass::create($data);
    }

    /**
     * @return Collection
     */
    public function get() : Collection
    {
       return $this->modelClass::all();
    }


}
