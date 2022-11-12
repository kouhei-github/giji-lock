<?php

namespace App\UseCases;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\UseCases\Interfaces\DeleteUserUseCaseInterface;
use Illuminate\Http\Request;


class DeleteUserUseCase implements DeleteUserUseCaseInterface
{
    private UserRepositoryInterface $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Userの削除
     * @param Request $request
     * @return void
     */
    public function handle(Request $request): void
    {
        // 所属グループのユーザー一覧取得
        $loginUser = $request->user();
        $users = $this->userRepository->findByGroup((int)$loginUser->group_id);

        $user = $request->all();
        $this->userRepository->delete($user["id"], $users);
    }
}
