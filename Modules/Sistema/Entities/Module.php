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
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Relation: Many to Many [Modules and Roles]
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Relation: One to Many [Modules and Controllers]
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function controllers()
    {
        return $this->hasMany(ModuleControllers::class);
    }
}
