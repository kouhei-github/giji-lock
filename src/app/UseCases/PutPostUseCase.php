<?php

namespace App\UseCases;

use App\Domains\PostDomain;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\UseCases\Interfaces\PutPostUseCaseInterface;
use Illuminate\Http\Request;


class PutPostUseCase implements PutPostUseCaseInterface
{
    private PostRepositoryInterface $postRepository;
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * 投稿情報を更新する
     * @param Request $request
     * @return void
     * @throws \Exception
     */
    public function handle(Request $request): void
    {
        $body       = $request->all();
        $postId     = $body["id"];
        $title      = $body["title"];
        $content    = $body["content"];
        $userId     = $body["user_id"];
        $post       = $this->postRepository->findById($postId);
        $postDomain = new PostDomain($title, $content, $userId);
        $this->postRepository->update($postDomain, $post);
    }
}
