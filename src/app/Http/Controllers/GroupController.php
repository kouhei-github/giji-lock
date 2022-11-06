<?php

namespace App\Http\Controllers;

use App\UseCases\Interfaces\DeleteGroupUseCaseInterface;
use App\UseCases\Interfaces\GetGroupUseCaseInterface;
use App\UseCases\Interfaces\PostGroupUseCaseInterface;
use App\UseCases\Interfaces\PutGroupUseCaseInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    private GetGroupUseCaseInterface    $getGroupUseCase;
    private PostGroupUseCaseInterface   $postGroupUseCase;
    private PutGroupUseCaseInterface    $putGroupUseCase;
    private DeleteGroupUseCaseInterface $deleteGroupUseCase;
    public function __construct(
        GetGroupUseCaseInterface    $getGroupUseCase,
        PostGroupUseCaseInterface   $postGroupUseCase,
        PutGroupUseCaseInterface    $putGroupUseCase,
        DeleteGroupUseCaseInterface $deleteGroupUseCase,
    ) {
        $this->getGroupUseCase    = $getGroupUseCase;
        $this->postGroupUseCase   = $postGroupUseCase;
        $this->putGroupUseCase    = $putGroupUseCase;
        $this->deleteGroupUseCase = $deleteGroupUseCase;
    }

    /**
     * コントローラー
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function switchHttpRequest(Request $request): JsonResponse
    {
        $loginUser = $request->user();
        if($loginUser->roll !== 999){
            return response()->json(["message" => "権限不足です"], 419);
        }
        $httpMethod = $request->method();
        switch ($httpMethod){
            case "GET":
                $group = $this->getGroupUseCase->handle($request);
                return response()->json($group);
            case "POST":
                $this->postGroupUseCase->handle($request);
                return response()->json(["message" => "保存できました。"], 201);
            case "PUT":
                $this->putGroupUseCase->handle($request);
                return response()->json(["message" => "更新できました。"]);
            case "DELETE":
                $this->deleteGroupUseCase->handle($request);
                return response()->json(["message" => "削除できました。"]);
        }
        return response()->json(["message" => "存在しません"], 302);
    }
}
