<?php

namespace App\UseCases\Interfaces;

use Illuminate\Http\Request;

/**
 * App\UseCases;
 */


interface PutGroupUseCaseInterface
{
    /**
     * 所属グループの更新するユースケース
     * @param Request $request
     * @return void
     * @throws \Exception
     */
    public function handle(Request $request): void;
}
