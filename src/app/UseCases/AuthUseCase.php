<?php

namespace App\UseCases;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\UseCases\Interfaces\AuthUseCaseInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthUseCase implements AuthUseCaseInterface
{
    private UserRepositoryInterface $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * アクセストークンを発行するハンドラー
     * @param Request $request
     * @return array
     */
    public function handle(Request $request): array
    {
        $credentials = Auth::attempt($request->only('email', 'password'));
        if(!$credentials){
            return [
                'message' => 'Invalid login details',
                "status"  => 401
            ];
        }

        $token = $this->userRepository->createAccessToken($request['email']);
        return [
            'access_token' => $token,
            'token_type' => 'Bearer',
            "status" => 201
        ];

    }
}
