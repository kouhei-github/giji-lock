<?php

namespace App\UseCases\Interfaces;

use Illuminate\Http\Request;


interface PostUserUseCaseInterface
{
    /**
     * userの新規登録
     * @param Request $request
     * @return void
     */
    public function handle(Request $request);
}
