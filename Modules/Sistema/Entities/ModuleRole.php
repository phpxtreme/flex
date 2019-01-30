<?php

namespace Modules\Sistema\Entities;

use Illuminate\Database\Eloquent\Model;

class ModuleRole extends Model
{
    /**
     * Relation Modules and Roles
     *
     * @var string
     */
    protected $table = 'pivot_module_role';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];
}
