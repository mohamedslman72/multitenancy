<?php

namespace App\Http\Controllers;

use App\Repositories\TenantRepositoryInterface;
use Illuminate\Http\Request;
class UserController extends Controller {
    private $tenantRepository;

    public function __construct(TenantRepositoryInterface $tenantRepository) {
        $this->tenantRepository = $tenantRepository;
    }
    public function listUsersByTenant(Request $request) {
        $users = $this->tenantRepository->getUsersByTenantId(auth()->user()->tenant_id);

        return view('user.index', compact('users'));
    }
}
