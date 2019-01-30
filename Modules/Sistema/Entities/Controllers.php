<?php

namespace Modules\Sistema\Entities;

use Illuminate\Database\Eloquent\Model;

class Controllers extends Model
{
    /**
     * Controllers Table
     *
     * @var string
     */
    protected $table = 'controllers';

    /**
     * Relation: Many to One [Module as Controllers]
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
