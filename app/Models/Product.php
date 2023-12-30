<?php

namespace App\Models;

use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Tenant;

class Product extends Model
{
    protected $fillable = ['tenant_id', 'user_id', 'name', 'price', 'description'];

    protected static function boot()
    {
        parent::boot();

        if (auth()->check()) {
            static::addGlobalScope(new TenantScope());
        }
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}
