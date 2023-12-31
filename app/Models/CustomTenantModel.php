<?php

namespace App\Models;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Spatie\Multitenancy\Models\Tenant;
use Spatie\Multitenancy\Tasks\SwitchTenantDatabaseTask;

class CustomTenantModel extends Tenant
{
    protected $fillable = ['id', 'name', 'database', 'domain'];
    protected $table = 'tenants';


    public function users()
    {
        return $this->hasMany(User::class, 'tenant_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'tenant_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'tenant_id');
    }

    // this hash code for multi-tenancy with multi databases

//    public static function booted()
//    {
//        static::creating(function (CustomTenantModel $model) {
//            $model->createDatabase();
//            $model->runMigrations();
//        });
//    }
//    public function createDatabase()
//    {
//        config(['database.default' => 'tenant']);
//        if (!DB::connection('tenant')->statement("CREATE DATABASE IF NOT EXISTS {$this->database}")) {
//            throw new \Exception("Failed to create database for tenant: {$this->name}");
//        }
//    }
//    public function runMigrations()
//    {
//        $switch_db = new SwitchTenantDatabaseTask();
//        $switch_db->makeCurrent($this);
//        Artisan::call('config:clear');
//        Artisan::call('migrate', [
//            '--database' => 'tenant',
//            '--path' => 'database/migrations',
//        ]);
//    }
}
