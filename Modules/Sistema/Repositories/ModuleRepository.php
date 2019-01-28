<?php

namespace Modules\Sistema\Repositories;

use Modules\Sistema\Entities\Module;

class ModuleRepository extends _Base implements _Interface
{
    /**
     * Select Module
     *
     * @param array $opts
     * @param bool  $one
     *
     * @return Module
     */
    public function select($opts = [], $one = false)
    {
        $model = new Module();

        foreach ($opts as $field => $value) {
            $model = $model->where([$field => $value]);
        }

        return $one ? $model->first() : $model;
    }

    /**
     * Create Module
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

        return Module::create($opts);
    }

    /**
     * Remove Module
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

        return Module::where($opts)->delete() ? true : false;
    }

    /**
     * Update Module
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

        return Module::where($opts)->update($values) ? true : false;
    }
}