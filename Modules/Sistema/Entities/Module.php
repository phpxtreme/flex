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
}
