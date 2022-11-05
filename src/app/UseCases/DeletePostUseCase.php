<?php

namespace App\UseCases;

use App\Repositories\Interfaces\PostRepositoryInterface;
use App\UseCases\Interfaces\DeletePostUseCaseInterface;
use Illuminate\Http\Request;


class DeletePostUseCase implements DeletePostUseCaseInterface
{
    private PostRepositoryInterface $postRepository;
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository =$postRepository;
    }

    /**
     * 投稿の削除のハンドラー
     * @param Request $request
     * @return void
     */
    public function handle(Request $request)
    {
        $body   = $request->all();
        $postId = $body["id"];
        $this->postRepository->delete($postId);
    }
}
