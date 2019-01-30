<?php

namespace Modules\Sistema\Entities;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    /**
     * Modules Table
     *
     * @var string
     */
    protected $table = 'modules';

    /**
     * Relation: One to Many [Module as Controllers]
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function controllers()
    {
        return $this->hasMany(Controllers::class);
    }
}
