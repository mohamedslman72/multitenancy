<?php

namespace Database\Seeders;

use App\Models\CustomTenantModel;
use App\Repositories\TenantRepositoryInterface;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    protected $tenantRepository;

    public function __construct(TenantRepositoryInterface $tenantRepository) {
        $this->tenantRepository = $tenantRepository;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->tenantRepository->createTenant([
            'name' => 'Tenant 1',
            'domain' => 'tenant1',
        ]);

        $this->tenantRepository->createTenant([
            'name' => 'Tenant 2',
            'domain' => 'tenant2',
        ]);

    }
    /*
     * php artisan db:seed --class=TenantsTableSeeder
php artisan db:seed --class=UsersTableSeeder

     */
}
