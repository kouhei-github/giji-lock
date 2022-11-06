<?php

namespace App\UseCases;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\PostRepository;
use App\UseCases\Interfaces\GetPostUseCaseInterface;
use Illuminate\Http\Request;


class GetPostUseCase implements GetPostUseCaseInterface
{
    private PostRepository $postRepository;
    private UserRepositoryInterface $userRepository;
    public function __construct(
        PostRepository          $postRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->postRepository = $postRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * 同じ所属のもののみ閲覧ができる
     * @param Request $request
     * @return array
     * @throws \Exception
     */
    public function handle(Request $request): array
    {
        $loginUser = $request->user();
        $users = $this->userRepository->findByGroup((int)$loginUser->group_id);
        // IDで検索
        $postId = $request->query("id");
        if (!is_null($postId) ) {
            $post = $this->postRepository->findById((int)$postId, $users);
            return $post->toArray();
        }

        // タイトルとページネーションで検索
        $pageNation = $request->query("page");
        $title = $request->query("title");
        if (!is_null($title) ) {
            $pageNation = is_null($pageNation) ? 1 : (int)$pageNation;
            return $this->postRepository->findByTitle($title, $pageNation, $users);
        }

        // ユーザーIDとページネーションで検索
        $userId = $request->query("user");
        if (!is_null($userId)) {
            $pageNation = is_null($pageNation) ? 1 : (int)$pageNation;
            return $this->postRepository->findByUserId((int)$userId, $pageNation);
        }

        // ページネーション単体
        if (!is_null($pageNation) ) {
            return $this->postRepository->getWithUserUsingPageNation((int)$pageNation, $users);
        }
        return $this->postRepository->getAll($users);
    }
}
