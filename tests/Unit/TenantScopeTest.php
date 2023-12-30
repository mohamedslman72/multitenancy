<?php

namespace Tests\Unit;

use App\Models\CustomTenantModel;
use App\Models\User;
use App\Scopes\TenantScope;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class TenantScopeTest extends TestCase {
    use RefreshDatabase;

    /** @test */
    public function it_applies_tenant_scope_when_user_is_authenticated() {
        // Create a tenant
        $tenant = CustomTenantModel::factory()->create();
        // Create a user and authenticate
        $user = User::factory()->create(['tenant_id' => $tenant->id]);
        Auth::login($user);

        // Get the underlying query to check the SQL statement
        $queryLog = DB::connection()->getQueryLog();
        $lastQuery = end($queryLog);
        if ($lastQuery && isset($lastQuery['query'])) {
            // Assert that the scope is applied (check if the WHERE clause contains the tenant_id)
            $this->assertMatchesRegularExpression('/where\s+"tenant_id"\s*=\s*\?/i', $lastQuery['query']);
        } else {
            $this->fail('No query found in the query log.');
        }
    }

    /** @test */
    public function it_does_not_apply_tenant_scope_when_user_is_not_authenticated() {
        // Logout any authenticated user
        Auth::logout();

        // Get the underlying query to check the SQL statement
        $queryLog = DB::connection()->getQueryLog();
        $lastQuery = end($queryLog);

        if ($lastQuery && isset($lastQuery['query'])) {
            // Assert that the scope is not applied (check if there's no WHERE clause for tenant_id)
            $this->assertDoesNotMatchRegularExpression('/where\s+"tenant_id"\s*=\s*\?/i', $lastQuery['query']);
        } else {
            $this->fail('No query found in the query log.');
        }
    }
}
