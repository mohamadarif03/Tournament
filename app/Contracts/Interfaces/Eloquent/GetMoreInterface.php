<?php

namespace App\Contracts\Interfaces\Eloquent;

interface GetMoreInterface
{
    /**
     * Handle get the specified data by id from models.
     *
     * @param string $slug
     * @return mixed
     */

    public function getMore(string $slug): mixed;
}
