<?php

namespace App\Repositories;


use App\Domains\GroupDomain;
use App\Models\Group;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class GroupRepository implements GroupRepositoryInterface
{
    private Group $group;
    public function __construct(Group $group)
    {
        $this->group = $group;
    }

    /**
     * 所属グループのデータを保存する
     * @param GroupDomain $groupDomain
     * @return void
     */
    public function save(GroupDomain $groupDomain): void
    {
        $this->group->name = $groupDomain->getName();
        $this->group->save();
    }

    /**
     * 所属グループの更新
     * @param GroupDomain $groupDomain
     * @param Collection|Group $group
     * @return void
     */
    public function update(GroupDomain $groupDomain, Collection|Group $group): void
    {
        $group->name = $groupDomain->getName();
        $group->update();
    }

    /**
     * 所属グループの削除
     * @param int $groupId
     * @return void
     */
    public function delete(int $groupId): void
    {
        $group = $this->group->find($groupId);
        $group->delete();
    }

    /**
     * @param int $groupId
     * @return Group|Collection|Model
     * @throws \Exception
     */
    public function findById(int $groupId): Group|Collection|Model
    {
        $group = $this->group->find($groupId);
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
