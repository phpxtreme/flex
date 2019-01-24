<?php

namespace Modules\Sistema\Repositories;

interface _Interface
{
    public function select($opts = [], $one = false);

    public function create($opts = [], $check = false);

    public function update($opts = [], $values = []);

    public function remove($opts = []);
}