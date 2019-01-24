<?php

namespace Modules\Sistema\Repositories;

use Modules\Sistema\Entities\Role;

class RoleRepository extends _Base implements _Interface
{
    /**
     * Select Role
     *
     * @param array $opts
     * @param bool  $one
     *
     * @return Role
     */
    public function select($opts = [], $one = false)
    {
        $model = new Role();

        foreach ($opts as $field => $value) {
            $model = $model->where([$field => $value]);
        }

        return $one ? $model->first() : $model;
    }

    /**
     * Create Role
     *
     * @param array $opts
     * @param bool  $check
     *
     * @return bool
     */
    public function create($opts = [], $check = false)
    {
        if ($check) {
            if ($this->select($opts, true)) {
                return false;
            }
        }

        return Role::create($opts);
    }

    /**
     * Remove Role
     *
     * @param array $opts
     *
     * @return bool
     */
    public function remove($opts = [])
    {
        if (!$this->select($opts, true)) {
            return false;
        }

        return Role::where($opts)->delete() ? true : false;
    }

    /**
     * Update Role
     *
     * @param array $opts
     * @param array $values
     *
     * @return bool
     */
    public function update($opts = [], $values = [])
    {
        if (!$this->select($opts)) {
            return false;
        }

        return Role::where($opts)->update($values) ? true : false;
    }
}