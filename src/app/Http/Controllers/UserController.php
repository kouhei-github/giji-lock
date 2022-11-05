<?php

namespace App\Http\Controllers;

use App\UseCases\Interfaces\DeleteUserUseCaseInterface;
use App\UseCases\Interfaces\GetUserUseCaseInterface;
use App\UseCases\Interfaces\PostUserUseCaseInterface;
use App\UseCases\Interfaces\UpdateUserUseCaseInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private GetUserUseCaseInterface    $getUserUseCase;
    private PostUserUseCaseInterface   $postUserUseCase;
    private UpdateUserUseCaseInterface $updateUserUseCase;
    private DeleteUserUseCaseInterface $deleteUserUseCase;
    public function __construct(
        GetUserUseCaseInterface $getUserUseCase,
        PostUserUseCaseInterface $postUserUseCase,
        UpdateUserUseCaseInterface $updateUserUseCase,
        DeleteUserUseCaseInterface $deleteUserUseCase,
    ) {
        $this->getUserUseCase    = $getUserUseCase;
        $this->postUserUseCase   = $postUserUseCase;
        $this->updateUserUseCase = $updateUserUseCase;
        $this->deleteUserUseCase = $deleteUserUseCase;
    }

    /**
     * @throws Exception
     */
    public function switchHttpRequest(Request $request): JsonResponse
    {
        $httpMethod = $request->method();
        switch ($httpMethod){
            case "GET":
                $user = $this->getUserUseCase->handle($request);
                return response()->json($user);
            case "POST":
                $this->postUserUseCase->handle($request);
                return response()->json(["message" => "保存できました。"], 201);
            case "PUT":
                $this->updateUserUseCase->handle($request);
                return response()->json(["message" => "更新できました。"]);
            case "DELETE":
                $this->deleteUserUseCase->handle($request);
                return response()->json(["message" => "削除できました。"]);
        }
        return response()->json(["message" => "存在しません"], 302);
    }
}
