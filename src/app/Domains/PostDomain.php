<?php

namespace App\Domains;

use App\Models\User;

class PostDomain
{
    private string $title;
    private string $content;
    private int $userId;
    public function __construct(string $title, string $content, int $userId)
    {
        $this->title   =$title;
        $this->content = $content;
        $exist         = $this->existInUser($userId);
        if (!$exist) {
            throw new \Exception("ユーザーが存在しません");
        }
        $this->userId = $userId;
    }
    /**
     * user_idがUser情報に存在するか確認
     * @param int $userId
     * @return bool
     */
    private function existInUser(int $userId)
    {
        $exist = true;
        $group = User::find($userId);
        if(is_null($group)){
            $exist = false;
        }
        return $exist;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }
}
