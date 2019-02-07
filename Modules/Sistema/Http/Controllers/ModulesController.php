<?php

namespace Modules\Sistema\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Sistema\Repositories\ModuleRepository;

class ModulesController extends Controller
{
    /**
     * Load the modules to which the authenticated user's role has access.
     *
     * @return mixed
     */
    public function modules()
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
     * Returns the controllers associated with the modules to be loaded.
     *
     * @return mixed
     */
    public function controllers()
    {
        return $this->modules()->map(function ($module) {
            return $module->controllers->pluck('path');
        })->collapse()->prepend('Viewport.Viewport');
    }
}
