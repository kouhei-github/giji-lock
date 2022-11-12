<?php

namespace App\Http\Controllers;

use App\UseCases\Interfaces\DeletePostUseCaseInterface;
use App\UseCases\Interfaces\GetPostUseCaseInterface;
use App\UseCases\Interfaces\PostPostUseCaseInterface;
use App\UseCases\Interfaces\PutPostUseCaseInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private GetPostUseCaseInterface    $getPostUseCase;
    private PostPostUseCaseInterface   $postPostUseCase;
    private PutPostUseCaseInterface    $putPostUseCase;
    private DeletePostUseCaseInterface $deletePostUseCase;
    public function __construct(
        GetPostUseCaseInterface    $getPostUseCase,
        PostPostUseCaseInterface   $postPostUseCase,
        PutPostUseCaseInterface    $putPostUseCase,
        DeletePostUseCaseInterface $deletePostUseCase,
    ) {
        $this->getPostUseCase    = $getPostUseCase;
        $this->postPostUseCase   = $postPostUseCase;
        $this->putPostUseCase    = $putPostUseCase;
        $this->deletePostUseCase = $deletePostUseCase;
    }

    public function switchHttpRequest(Request $request): JsonResponse
    {
        $httpMethod = $request->method();
        switch ($httpMethod){
            case "GET":
                $group = $this->getPostUseCase->handle($request);
                return response()->json($group);
            case "POST":
                $this->postPostUseCase->handle($request);
                return response()->json(["message" => "保存できました。"], 201);
            case "PUT":
                $this->putPostUseCase->handle($request);
                return response()->json(["message" => "更新できました。"]);
            case "DELETE":
                $this->deletePostUseCase->handle($request);
                return response()->json(["message" => "削除できました。"]);
        }
        return response()->json(["message" => "存在しません"], 302);
    }
}
