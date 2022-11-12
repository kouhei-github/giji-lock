<?php

namespace App\UseCases;

use App\Domains\GroupDomain;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use App\UseCases\Interfaces\PostGroupUseCaseInterface;
use Illuminate\Http\Request;


class PostGroupUseCase implements PostGroupUseCaseInterface
{
    private GroupRepositoryInterface $groupRepository;
    public function __construct(GroupRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    /**
     * 所属グループを保存する処理のユースケース
     * @param Request $request
     * @return void
     * @throws \Exception
     */
    public function handle(Request $request): void
    {
        $body        = $request->all();
        $groupDomain = new GroupDomain($body["name"]);
        $this->groupRepository->save($groupDomain);
    }
}
