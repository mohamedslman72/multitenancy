<?php

namespace App\Repositories;

use App\Models\User;
use App\Traits\ModelGetterTrait;

class UserRepository implements UserRepositoryInterface
{
    use ModelGetterTrait;
    protected $modelClass = User::class;

    /**
     * @param $data
     * @return mixed
     */
    public function createUserForTenant($data ) {

        return $this->modelClass::create($data);
    }


}
