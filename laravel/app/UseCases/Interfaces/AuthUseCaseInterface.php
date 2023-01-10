<?php

namespace App\UseCases\Interfaces;

use App\Http\Requests\LoginRequest;

/**
 * App\UseCases;
 */


interface AuthUseCaseInterface
{
    /**
     * アクセストークンを発行するハンドラー
     * @param LoginRequest $request
     * @return array
     */
    public function handle(LoginRequest $request): array;
}
