<?php

namespace Modules\Sistema\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Roles Table
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * Relation: Many to Many [Roles and Users]
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}