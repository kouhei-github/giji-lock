<?php

namespace App\UseCases\Interfaces;

use Illuminate\Http\Request;


interface DeletePostUseCaseInterface
{
    /**
     * 投稿の削除のハンドラー
     * @param Request $request
     * @return void
     * @throws \Exception
     */
    public function handle(Request $request): void;
}
