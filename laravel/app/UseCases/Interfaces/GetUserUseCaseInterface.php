<?php

namespace App\UseCases\Interfaces;

use Illuminate\Http\Request;

/**
 * App\UseCases;
 */


interface GetUserUseCaseInterface
{
    /**
     * ユーザー情報の取得
     * @param Request $request
     * @return array
     * @throws \Exception
     */
    public function handle(Request $request): array;
}
