<?php

namespace Modules\Sistema\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Sistema\Repositories\ModuleRepository;

class ModulesController extends Controller
{
    /**
     * Read Modules
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function read(Request $request)
    {
        /** @var ModuleRepository $repository */
        $repository = new ModuleRepository();

        if (!$request->get('filter')) {
            return $repository->select()
                ->orderBy('id', 'ASC')
                ->with(['controllers'])
                ->get();
        } else {
            return $repository->select(json_decode($request->get('filter')))
                ->orderBy('id', 'ASC')
                ->with(['controllers'])
                ->get();
        }
    }
}
