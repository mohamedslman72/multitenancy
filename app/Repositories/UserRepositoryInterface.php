<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function createUserForTenant( $data);
}
