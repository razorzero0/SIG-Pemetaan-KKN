<?php

namespace App\Repositories\Location;

use App\Repositories\BaseRepo\BaseRepository;

interface LocationRepositoryInterface extends BaseRepository
{
    public function orderVillage();
}
