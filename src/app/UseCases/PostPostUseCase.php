<?php

namespace App\UseCases;


use App\Domains\PostDomain;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\UseCases\Interfaces\PostPostUseCaseInterface;
use Illuminate\Http\Request;

class PostPostUseCase implements PostPostUseCaseInterface
{
    private PostRepositoryInterface $postRepository;
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * 投稿情報を保存する
     * @param Request $request
     * @return void
     * @throws \Exception
     */
    public function handle(Request $request): void
    {
        // 所属グループのユーザー一覧取得
        $loginUser = $request->user();

        $body = $request->all();
        $postDomain = new PostDomain($body["title"], $body["content"], (int)$loginUser->id);
        $this->postRepository->save($postDomain);
    }
}
