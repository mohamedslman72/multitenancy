<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait ModelGetterTrait {
    public function getModel() {
        return $this->modelClass;
    }
}
