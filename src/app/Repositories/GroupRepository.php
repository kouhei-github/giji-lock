<?php

namespace App\Repositories;


use App\Models\Group;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class GroupRepository
{
    private Group $group;
    public function __construct(Group $group)
    {
        $this->group = $group;
    }

    public function save(): void
    {
        //
    }

    public function update(): void
    {
        //
    }

    /**
     * @param int $groupId
     * @return Group|Collection|Model
     * @throws \Exception
     */
    public function findById(int $groupId): Group|Collection|Model
    {
        $group = $this->group->find(1);
        if (is_null($group)) {
            throw new \Exception($groupId . ": group_idが存在しません");
        }
        return $group;
    }

    /**
     * Groupの情報をページネーションを使用して取得する
     * @param int $pageNation
     * @return array
     * @throws \Exception
     */
    public function getInfoUsingPageNation(int $pageNation): array
    {
        $groups = $this->group::paginate(20, ['*'], 'page', $pageNation);
        if (count($groups) === 0) {
            throw new \Exception( "Groupが存在しません");
        }
        return $groups->toArray();
    }

    /**
     * User情報を紐付けてGroupの情報を取得する
     * @param int $pageNation
     * @return array
     * @throws \Exception
     */
    public function getAllWithUser(int $pageNation): array
    {
        $groups = $this->group::with("users")->paginate(20, ['*'], 'page', $pageNation);
        if (count($groups) === 0) {
            throw new \Exception( "Groupが存在しません");
        }
        return $groups->toArray();
    }

    /**
     * Groupの情報を取得する
     * @return Collection
     * @throws \Exception
     */
    public function getAll(): Collection
    {
        $groups = $this->group::all();
        if (count($groups) === 0) {
            throw new \Exception( "Groupが存在しません");
        }
        return $groups;
    }
}
