<?php

namespace App\UseCases\Interfaces;

use Illuminate\Http\Request;

/**
 * App\UseCases;
 */


interface PutPostUseCaseInterface
{
    /**
     * 投稿情報を更新する
     * @param Request $request
     * @return void
     * @throws \Exception
     */
    public function handle(Request $request): void;
}
