<?php

namespace App\UseCases;

use App\Repositories\GroupRepository;
use App\UseCases\Interfaces\DeleteGroupUseCaseInterface;
use Illuminate\Http\Request;


class DeleteGroupUseCase implements DeleteGroupUseCaseInterface
{
    private GroupRepository $groupRepository;
    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    /**
     * @param Request $request
     * @return void
     */
    public function handle(Request $request): void
    {
        $body = $request->all();
        $this->groupRepository->delete($body["id"]);
    }
}
