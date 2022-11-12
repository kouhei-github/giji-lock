<?php

namespace App\UseCases\Interfaces;

use Illuminate\Http\Request;


interface PostUserUseCaseInterface
{
    /**
     * userの新規登録
     * @param Request $request
     * @return void
     * @throws \Exception
     */
    public function handle(Request $request): void;
}
