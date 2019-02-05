<?php

namespace Modules\Sistema\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Sistema\Repositories\ModuleRepository;

class ModulesController extends Controller
{
    /**
     * Load the modules for the role of the logged in user
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function load(Request $request)
    {
        /** @var ModuleRepository $repository */
        $repository = new ModuleRepository();

        /** @var array $roles */
        $roles = Auth::user()->roles()->get()
            ->map(function ($role) {
                return $role->only('id');
            })->pluck('id');

        return $repository->select(['active' => true])
            ->whereHas('roles', function ($query) use ($roles) {
                $query->whereIn('role_id', $roles);
            })
            ->orderBy('id', 'ASC')
            ->get();
    }

    /**
     * Returns the controllers of the modules to which
     * the authenticated user can access.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function controllers(Request $request)
    {
        return $this->load($request)
            ->map(function ($module) {
                return $module->controllers->first()->path;
            })->prepend('Viewport.Viewport');
    }
}
