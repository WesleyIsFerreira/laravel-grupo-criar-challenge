<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface RaceLapRepositoryInterface
{
    public function getRaceResults(): Collection;
}
