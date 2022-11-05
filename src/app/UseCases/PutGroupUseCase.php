<?php

namespace App\UseCases;

use App\Domains\GroupDomain;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use App\UseCases\Interfaces\PutGroupUseCaseInterface;
use Illuminate\Http\Request;


class PutGroupUseCase implements PutGroupUseCaseInterface
{
    private GroupRepositoryInterface $groupRepository;
    public function __construct(GroupRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    /**
     * 所属グループの更新するユースケース
     * @param Request $request
     * @return void
     * @throws \Exception
     */
    public function handle(Request $request): void
    {
        $body        = $request->all();
        $name        = $body["name"];
        $groupId     = $body["id"];
        $group       = $this->groupRepository->findById($groupId);
        $groupDomain = new GroupDomain($name);
        $this->groupRepository->update($groupDomain, $group);
    }
}
