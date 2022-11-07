<?php

namespace App\UseCases\Interfaces;

use Illuminate\Http\Request;

/**
 * App\UseCases;
 */


interface DeleteUserUseCaseInterface
{
    /**
     * Userの削除
     * @param Request $request
     * @return void
     */
    public function handle(Request $request): void;
}
