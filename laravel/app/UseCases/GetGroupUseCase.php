<?php

namespace App\UseCases;

use App\Repositories\Interfaces\GroupRepositoryInterface;
use App\UseCases\Interfaces\GetGroupUseCaseInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;


class GetGroupUseCase implements GetGroupUseCaseInterface
{
    private GroupRepositoryInterface $groupRepository;
    public function __construct(GroupRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    /**
     * @param Request $request
     * @return array|Collection
     * @throws \Exception
     */
    public function handle(Request $request): array|Collection
    {
        $groupId = $request->query("id");
        if (!is_null($groupId) ) {
            $group = $this->groupRepository->findById((int)$groupId);
            return $group->toArray();
        }

        $pageNation = $request->query("page");
        if (!is_null($pageNation) ) {
            return $this->groupRepository->getInfoUsingPageNation((int)$pageNation);
        }
        return $this->groupRepository->getAll();
    }
}
