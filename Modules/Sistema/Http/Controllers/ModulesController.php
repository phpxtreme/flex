<?php

namespace Modules\Sistema\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Sistema\Repositories\ModuleRepository;

class ModulesController extends Controller
{
    /**
     * Read all modules
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function read(Request $request)
    {
        $repository   = new ModuleRepository();
        $moduleRegion = $request->only('region');

        if ($moduleRegion) {
            return $repository->select(['region' => $moduleRegion])
                ->orderBy('id', 'ASC')
                ->get();
        } else {
            return $repository->select()
                ->orderBy('id', 'ASC')
                ->get();
        }
    }
}
