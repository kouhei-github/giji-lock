<?php

namespace App\Repositories\Interfaces;

use App\Domains\UserDomain;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * App\UseCases;
 */


interface UserRepositoryInterface
{
    /**
     * idで検索をかけてUser情報を取得する
     * @param int $userId
     * @return Collection|Model
     * @throws \Exception
     */
    public function findById(int $userId): Collection|Model;

    /**
     * ユーザー情報を全て取得する
     * @return array
     * @throws \Exception
     */
    public function getAll(): array;

    /**
     * Userデータを保存する
     * @param UserDomain $userDomain
     * @return void
     */
    public function save(UserDomain $userDomain): void;

    /**
     * User情報の更新
     * @param UserDomain $userDomain
     * @param Collection|User $user
     * @return void
     */
    public function update(UserDomain $userDomain, Collection|User $user): void;

    /**
     * Userを削除する
     * @param int $userId
     * @return void
     */
    public function delete(int $userId);

    /**
     * User情報をpagenationして取得する
     * @param int $pageNation
     * @return array
     * @throws \Exception
     */
    public function getInfoUsingPagination(int $pageNation): array;
}
