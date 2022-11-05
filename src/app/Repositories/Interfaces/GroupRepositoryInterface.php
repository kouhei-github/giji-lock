<?php

namespace App\Repositories\Interfaces;

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
}
