<?php

namespace App\UseCases;

use App\Domains\UserDomain;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\UseCases\Interfaces\PostUserUseCaseInterface;
use Illuminate\Http\Request;


class PostUserUseCase implements PostUserUseCaseInterface
{
    private UserRepositoryInterface $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * userの新規登録
     * @param Request $request
     * @return void
     * @throws \Exception
     */
    public function handle(Request $request)
    {
        // ログインユーザー
        $loginUser = $request->user();

        $body = $request->all();
        $userDomain = new UserDomain(
            $body["name"],
            $body["email"],
            $loginUser->group_id,
            $body["roll"],
            $body["password"]
        );
        $this->userRepository->save($userDomain);
    }
}
