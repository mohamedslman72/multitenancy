<?php

namespace Database\Seeders;

use App\Repositories\TenantRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    protected $userRepository;
    protected $tenantRepository;

    public function __construct(UserRepositoryInterface $userRepository, TenantRepositoryInterface $tenantRepository) {
        $this->userRepository = $userRepository;
        $this->tenantRepository = $tenantRepository;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenants = $this->tenantRepository->get();
        foreach ($tenants as $tenant) {
            $this->userRepository->createUserForTenant( [
                'name' => "User for Tenant {$tenant->id}",
                'email' => "user{$tenant->id}@tenant{$tenant->id}.com",
                'password' => bcrypt('password'),
                'tenant_id'=>$tenant->id,
            ]);
        }
    }
}
