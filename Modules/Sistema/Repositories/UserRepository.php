<?php

namespace Modules\Sistema\Repositories;

use Modules\Sistema\Entities\User;

class UserRepository extends _Base implements _Interface
{
    /**
     * Select User
     *
     * @param array $opts
     * @param bool  $one
     *
     * @return User
     */
    public function select($opts = [], $one = false)
    {
        $model = new User();

        foreach ($opts as $field => $value) {
            $model = $model->where([$field => $value]);
        }

        return $one ? $model->first() : $model;
    }

    /**
     * Create User
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

        return User::create($opts);
    }

    /**
     * Remove User
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

        return User::where($opts)->delete() ? true : false;
    }

    /**
     * Update User
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

        return User::where($opts)->update($values) ? true : false;
    }
}