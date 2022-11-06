<?php

namespace App\UseCases;

use App\Domains\PostDomain;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\UseCases\Interfaces\PutPostUseCaseInterface;
use Illuminate\Http\Request;


class PutPostUseCase implements PutPostUseCaseInterface
{
    private PostRepositoryInterface $postRepository;
    private UserRepositoryInterface $userRepository;
    public function __construct(
        PostRepositoryInterface $postRepository,
        UserRepositoryInterface $userRepository,
    ) {
        $this->postRepository = $postRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * 投稿情報を更新する
     * @param Request $request
     * @return void
     * @throws \Exception
     */
    public function handle(Request $request): void
    {
        // 所属の同じユーザー一覧の取得
        $loginUser = $request->user();
        $users = $this->userRepository->findByGroup((int)$loginUser->group_id);

        // リクエストの処理
        $body       = $request->all();
        $postId     = $body["id"];
        $title      = $body["title"];
        $content    = $body["content"];
        $userId     = (int)$loginUser->id;

        // 検索
        $post       = $this->postRepository->findById($postId, $users);
        $postDomain = new PostDomain($title, $content, $userId);
        $this->postRepository->update($postDomain, $post);
    }
}
