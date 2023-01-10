<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Traits\HttpResponses;
use App\UseCases\Interfaces\AuthUseCaseInterface;
use Illuminate\Http\JsonResponse;


class AuthController extends Controller
{
    use HttpResponses;

    private AuthUseCaseInterface $authUseCase;
    public function __construct(AuthUseCaseInterface $authUseCase)
    {
        $this->authUseCase = $authUseCase;
    }

    /**
     * ログインしたらアクセストークンを発行する
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $result = $this->authUseCase->handle($request);
        if($result["status"] === 401) {
//            return response()->json($result, 401);
            return $this->error($result, $code=$result["status"]);
        }
        return $this->success($result, $code=$result["status"]);
    }
}
