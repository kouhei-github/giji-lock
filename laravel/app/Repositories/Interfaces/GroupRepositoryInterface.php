<?php

namespace App\Repositories\Interfaces;

use App\Domains\GroupDomain;
use App\Models\Group;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * App\UseCases;
 */


interface GroupRepositoryInterface
{
    /**
     * @param int $groupId
     * @return Group|Collection|Model
     * @throws \Exception
     */
    public function findById(int $groupId): Group|Collection|Model;

    /**
     * Groupの情報を取得する
     * @param int $pageNation
     * @return array
     * @throws \Exception
     */
    public function getInfoUsingPageNation(int $pageNation): array;

    /**
     * User情報を紐付けてGroupの情報を取得する
     * @param int $pageNation
     * @return array
     * @throws \Exception
     */
    public function getAllWithUser(int $pageNation): array;

    /**
     * Groupの情報を取得する
     * @return Collection
     * @throws \Exception
     */
    public function getAll(): Collection;

    /**
     * 所属グループのデータを保存する
     * @param GroupDomain $groupDomain
     * @return void
     */
    public function save(GroupDomain $groupDomain): void;

    /**
     * 所属グループの更新
     * @param GroupDomain $groupDomain
     * @param Collection|Group $group
     * @return void
     */
    public function update(GroupDomain $groupDomain, Collection|Group $group): void;

    /**
     * 所属グループの削除
     * @param int $groupId
     * @return void
     */
    public function delete(int $groupId): void;
}
