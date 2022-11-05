<?php

namespace App\Repositories;

use App\Domains\UserDomain;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
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
        $user = [
            "name"     => $userDomain->getName(),
            "email"    => $userDomain->getEmail(),
            "password" => $userDomain->getPassword(),
            "group_id" => $userDomain->getGropuId(),
            "roll"     => $userDomain->getRoll(),
        ];
        $this->user::insert($user);
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
     * @return Collection|Model
     * @throws \Exception
     */
    public function findById(int $userId): Collection|Model
    {
        $user = $this->user->with("group")->find($userId);
        if (is_null($user)) {
            throw new \Exception($userId . ": user_idが存在しません");
        }
        return $user;
    }

    /**
     * Userを削除する
     * @param int $userId
     * @return void
     */
    public function delete(int $userId)
    {
        $user = $this->user->find($userId);
        $user->delete();
    }

    /**
     * ユーザー情報を全て取得する
     * @return array
     * @throws \Exception
     */
    public function getAll(): array
    {
        $user = $this->user::with("group")->get();
        if (count($user) === 0) {
            throw new \Exception( "Userが一人も入っていません");
        }
        return $user->toArray();
    }


    /**
     * User情報をpagenationして取得する
     * @param int $pageNation
     * @return array
     * @throws \Exception
     */
    public function getInfoUsingPagination(int $pageNation): array
    {
        $user = $this->user::with("group")->paginate(20, ['*'], 'page', $pageNation);;
        if (count($user) === 0) {
            throw new \Exception( "Userが一人も入っていません");
        }
        return $user->toArray();
    }

    public function findByEmail()
    {
        //
    }
}
