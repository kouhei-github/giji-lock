<?php

namespace App\Repositories\Interfaces;

use App\Domains\UserDomain;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
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
     * @param array $users
     * @return Collection|Model
     * @throws \Exception
     */
    public function findById(int $userId, array $users): Collection|Model;

    /**
     * ユーザー情報を全て取得する
     * @param array $users
     * @return array
     */
    public function getAll(array $users): array;

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
     * @param array $users
     * @return void
     */
    public function delete(int $userId, array $users): void;

    /**
     * User情報をpagenationして取得する
     * @param int $pageNation
     * @param array $users
     * @return array
     */
    public function getInfoUsingPagination(int $pageNation, array $users): array;

    /**
     * メールアドレスを使用してUserを検索する
     * @param string $email
     * @return User|Builder|Model
     */
    public function findByEmail(string $email): User|Builder|Model;

    /**
     * アクセストークンを発行する
     * @param string $email
     * @return string
     */
    public function createAccessToken(string $email): string;

    /**
     * 所属グループのUser一覧の取得
     * @param int $groupId
     * @return array
     */
    public function findByGroup(int $groupId): array;
}
