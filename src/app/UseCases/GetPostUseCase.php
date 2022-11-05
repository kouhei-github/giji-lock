<?php

namespace App\UseCases;

use App\Repositories\PostRepository;
use App\UseCases\Interfaces\GetPostUseCaseInterface;
use Illuminate\Http\Request;


class GetPostUseCase implements GetPostUseCaseInterface
{
    private PostRepository $postRepository;
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * 投稿情報を取得するハンドラー
     * @param Request $request
     * @return array
     * @throws \Exception
     */
    public function handle(Request $request): array
    {
        $postId = $request->query("id");
        if (!is_null($postId) ) {
            $post = $this->postRepository->findById((int)$postId);
            return $post->toArray();
        }
        $pageNation = $request->query("page");
        if (!is_null($pageNation) ) {
            return $this->postRepository->getWithUserUsingPageNation((int)$pageNation);
        }
        return $this->postRepository->getAll();
    }
}
