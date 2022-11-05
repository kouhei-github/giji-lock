<?php

namespace App\Domains;

use App\Models\Group;
use Illuminate\Support\Facades\Hash;

class UserDomain
{
    private string        $name;
    private string        $email;
    private int           $gropuId;
    private int           $roll;
    private string | null $password;
    public function __construct(string $name, string $email, int $groupId, int $roll, string | null $password=null)
    {
        $this->name = $name;
        if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
            throw new \Exception($email . " はメールアドレスの形式ではありません。");
        }
        $this->email = $email;
        $this->password = Hash::make($password);

        // グループのIDの配列の作成
        $exist = $this->existInGroup($groupId);
        // グループIDのバリデーション
        if (!$exist) {
            throw new \Exception($groupId . " はグループIDに存在しません。");
        }
        $this->gropuId = $groupId;

        // rollのIDの確認
        if (!in_array($roll, [1, 2])) {
            throw new \Exception($groupId . " rollは1=>管理者, 2 => ユーザーで登録して下さい");
        }
        $this->roll    = $roll;
    }

    /**
     * group_idがgroupsテーブルに存在するか確認
     * @param int $groupId
     * @return bool
     */
    private function existInGroup(int $groupId): bool
    {
        $exist = true;
        $group = Group::find($groupId);
        if(is_null($group)){
            $exist = false;
        }
        return $exist;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getGropuId(): int
    {
        return $this->gropuId;
    }

    /**
     * @return int
     */
    public function getRoll(): int
    {
        return $this->roll;
    }

    /**
     * @param int $gropuId
     */
    public function setGropuId(int $gropuId): void
    {
        $this->gropuId = $gropuId;
    }

    /**
     * @param int $roll
     */
    public function setRoll(int $roll): void
    {
        $this->roll = $roll;
    }
}
