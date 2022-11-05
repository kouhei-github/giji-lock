<?php

namespace App\UseCases\Interfaces;

use Illuminate\Http\Request;

/**
 * App\UseCases;
 */


interface GetPostUseCaseInterface
{
    /**
     * 投稿情報を取得するハンドラー
     * @param Request $request
     * @return array
     * @throws \Exception
     */
    public function handle(Request $request): array;
}
