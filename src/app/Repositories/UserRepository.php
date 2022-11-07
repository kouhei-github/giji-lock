<?php

namespace App\Repositories;

use App\Domains\UserDomain;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class UserRepository implements UserRepositoryInterface
{
    private User $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Userデータを保存する
     * @param UserDomain $userDomain
     * @return void
     */
    public function save(UserDomain $userDomain): void
    {
        $this->user->name     = $userDomain->getName();
        $this->user->email    = $userDomain->getEmail();
        $this->user->password = $userDomain->getPassword();
        $this->user->group_id = $userDomain->getGropuId();
        $this->user->roll     = $userDomain->getRoll();

        $this->user->save();
    }

    /**
     * User情報の更新
     * @param UserDomain $userDomain
     * @param Collection|User $user
     * @return void
     */
    public function update(UserDomain $userDomain, Collection|User $user): void
    {
        $user->name     = $userDomain->getName();
        $user->email    = $userDomain->getEmail();
        $user->password = $userDomain->getPassword();
        $user->group_id = $userDomain->getGropuId();
        $user->roll     = $userDomain->getRoll();
        $user->update();
    }

    /**
     * idで検索をかけてUser情報を取得する
     * @param int $userId
     * @param array $users
     * @return Collection|Model
     * @throws \Exception
     */
    public function findById(int $userId, array $users): Collection|Model
    {
        $user = $this->user->with("group")
            ->find($users)
            ->find($userId);
        if (is_null($user)) {
            throw new \Exception($userId . ": user_idが存在しません");
        }
        return $user;
    }

    /**
     * 所属グループのUser一覧の取得
     * @param int $groupId
     * @return array
     */
    public function findByGroup(int $groupId): array
    {
        return $this->user->where("group_id", "=", $groupId)
            ->pluck('id')
            ->toArray();
    }

    /**
     * メールアドレスを使用してUserを検索する
     * @param string $email
     * @return User|Builder|Model
     */
    public function findByEmail(string $email): User|Builder|Model
    {
        return $this->user->where('email', '=', $email)
            ->firstOrFail();
    }

    /**
     * アクセストークンを発行する
     * @param string $email
     * @return string
     */
    public function createAccessToken(string $email): string
    {
        $user = $this->user->where('email', '=', $email)->firstOrFail();
        return $user->createToken('auth_token')->plainTextToken;
    }

    /**
     * Userを削除する
     * @param int $userId
     * @param array $users
     * @return void
     */
    public function delete(int $userId, array $users): void
    {
        $user = $this->user
            ->find($users)
            ->find($userId);
        $user->delete();
    }

    /**
     * ユーザー情報を全て取得する
     * @param array $users
     * @return array
     */
    public function getAll(array $users): array
    {
        return $this->user::with("group")
            ->findMany($users)
            ->toArray();
    }

    /**
     * User情報をpagenationして取得する
     * @param int $pageNation
     * @param array $users
     * @return array
     */
    public function getInfoUsingPagination(int $pageNation, array $users): array
    {
        return $this->user::with("group")
            ->whereIn("id", $users)
            ->paginate(20, ['*'], 'page', $pageNation)
            ->toArray();
    }
}
