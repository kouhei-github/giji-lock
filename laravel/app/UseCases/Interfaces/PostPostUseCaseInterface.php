<?php

namespace App\UseCases\Interfaces;

use Illuminate\Http\Request;

/**
 * App\UseCases;
 */


interface PostPostUseCaseInterface
{
    /**
     * 投稿情報を保存する
     * @param Request $request
     * @return void
     * @throws \Exception
     */
    public function handle(Request $request): void;
}
