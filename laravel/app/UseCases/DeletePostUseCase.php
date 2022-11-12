<?php

namespace App\UseCases;

use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\UseCases\Interfaces\DeletePostUseCaseInterface;
use Illuminate\Http\Request;


class DeletePostUseCase implements DeletePostUseCaseInterface
{
    private PostRepositoryInterface $postRepository;
    private UserRepositoryInterface $userRepository;
    public function __construct(
        PostRepositoryInterface $postRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->postRepository = $postRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * 投稿の削除のハンドラー
     * @param Request $request
     * @return void
     * @throws \Exception
     */
    public function handle(Request $request): void
    {
        // 所属の同じユーザー一覧の取得
        $loginUser = $request->user();
        $users     = $this->userRepository->findByGroup((int)$loginUser->group_id);

        // 投稿を削除
        $body   = $request->all();
        $postId = $body["id"];
        $this->postRepository->delete($postId, $users);
    }
}
