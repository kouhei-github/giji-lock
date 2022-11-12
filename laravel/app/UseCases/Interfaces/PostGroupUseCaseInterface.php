<?php

namespace App\UseCases\Interfaces;

use Illuminate\Http\Request;

/**
 * App\UseCases;
 */


interface PostGroupUseCaseInterface
{
    /**
     * 所属グループを保存する処理のユースケース
     * @param Request $request
     * @return void
     * @throws \Exception
     */
    public function handle(Request $request): void;
}
