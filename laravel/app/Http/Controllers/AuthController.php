<?php

namespace App\Http\Controllers;

use App\UseCases\Interfaces\AuthUseCaseInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private AuthUseCaseInterface $authUseCase;
    public function __construct(AuthUseCaseInterface $authUseCase)
    {
        $this->authUseCase = $authUseCase;
    }

    /**
     * ログインしたらアクセストークンを発行する
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $result = $this->authUseCase->handle($request);
        if($result["status"] === 401) {
            return response()->json($result, 401);
        }
        return response()->json($result, 201);
    }
}
