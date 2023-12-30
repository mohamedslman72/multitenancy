<?php

namespace App\Models;

use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Tenant;

class Order extends Model
{
    protected $fillable = ['tenant_id','user_id','order_number','total_amount'];

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
