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
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

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