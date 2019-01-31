<?php

namespace Modules\Sistema\Entities;

use Illuminate\Database\Eloquent\Model;

class ModuleControllers extends Model
{
    /**
     * Modules Controllers Table
     *
     * @var string
     */
    protected $table = 'module_controllers';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Relation: One to Many (Inverse) [Controllers and Modules]
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
