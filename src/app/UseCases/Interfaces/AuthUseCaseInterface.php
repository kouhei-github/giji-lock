<?php

namespace App\UseCases\Interfaces;

use Illuminate\Http\Request;

/**
 * App\UseCases;
 */


interface AuthUseCaseInterface
{
    /**
     * アクセストークンを発行するハンドラー
     * @param Request $request
     * @return array
     */
    public function handle(Request $request): array;
}
