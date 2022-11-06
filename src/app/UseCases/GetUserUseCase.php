<?php

namespace App\UseCases;


use App\Repositories\Interfaces\UserRepositoryInterface;
use App\UseCases\Interfaces\GetUserUseCaseInterface;
use Illuminate\Http\Request;

class GetUserUseCase implements GetUserUseCaseInterface
{
    private  UserRepositoryInterface $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * ユーザー情報の取得
     * @param Request $request
     * @return array
     * @throws \Exception
     */
    public function handle(Request $request): array
    {
        // 所属グループのユーザー一覧取得
        $loginUser = $request->user();
        $users = $this->userRepository->findByGroup((int)$loginUser->group_id);

        // 検索
        $userId = $request->query("id");
        if (!is_null($userId) ) {
            $user = $this->userRepository->findById((int)$userId, $users);
            return $user->toArray();
        }
        $pageNation = $request->query("page");
        if (!is_null($pageNation) ) {
            return $this->userRepository->getInfoUsingPagination((int)$pageNation, $users);
        }
        return $this->userRepository->getAll($users);
    }
}
