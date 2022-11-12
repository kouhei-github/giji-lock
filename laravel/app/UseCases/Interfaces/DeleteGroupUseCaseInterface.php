<?php

namespace App\UseCases\Interfaces;

use Illuminate\Http\Request;

/**
 * App\UseCases;
 */


interface DeleteGroupUseCaseInterface
{
    /**
     * @param Request $request
     * @return void
     */
    public function handle(Request $request): void;
}
