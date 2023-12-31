<?php

namespace App\Http\Controllers;

use App\Repositories\TenantRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller {
    private $tenantRepository;

    /**
     * @param TenantRepositoryInterface $tenantRepository
     */
    public function __construct(TenantRepositoryInterface $tenantRepository) {
        $this->tenantRepository = $tenantRepository;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function listUsersByTenant(Request $request) :View {
        $users = $this->tenantRepository->getUsersByTenantId(auth()->user()->tenant_id);

        return view('user.index', compact('users'));
    }
}
