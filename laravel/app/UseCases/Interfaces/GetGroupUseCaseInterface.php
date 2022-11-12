<?php

namespace App\UseCases\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

/**
 * App\UseCases;
 */


interface GetGroupUseCaseInterface
{
    /**
     * @param Request $request
     * @return array|Collection
     * @throws \Exception
     */
    public function handle(Request $request): array|Collection;
}
