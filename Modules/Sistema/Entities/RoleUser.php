<?php

namespace Modules\Sistema\Entities;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    /**
     * Relation Roles and Users
     *
     * @var string
     */
    protected $table = 'role_user';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Relation: One to One [User and Role]
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    /**
     * Relation: One to One [Role and User]
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        return $this->hasOne(Role::class);
    }
}
