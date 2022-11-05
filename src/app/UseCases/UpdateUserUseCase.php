<?php

namespace App\UseCases;


use App\Domains\UserDomain;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\UseCases\Interfaces\UpdateUserUseCaseInterface;
use Illuminate\Http\Request;

class UpdateUserUseCase implements UpdateUserUseCaseInterface
{
    private UserRepositoryInterface $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * UpdateUserUseCaseのハンドリング
     * @param Request $request
     * @return void
     * @throws \Exception
     */
    public function handle(Request $request): void
    {
        $body       = $request->all();
        $userId     = $body["id"];
        $user       = $this->userRepository->findById($userId);
        $userDomain = new UserDomain(
            $body["name"],
            $body["email"],
            $body["group_id"],
            $body["roll"],
            $body["password"]
        );
        $this->userRepository->update($userDomain, $user);
    }
}
