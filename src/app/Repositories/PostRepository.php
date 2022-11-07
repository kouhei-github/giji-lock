<?php

namespace App\Repositories;

use App\Domains\PostDomain;
use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class PostRepository implements PostRepositoryInterface
{
    private Post $post;
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * 投稿情報を保存する
     * @param PostDomain $postDomain
     * @return void
     */
    public function save(PostDomain $postDomain): void
    {
        $this->post->title   = $postDomain->getTitle();
        $this->post->content = $postDomain->getContent();
        $this->post->user_id = $postDomain->getUserId();

        $this->post->save();
    }

    /**
     * 投稿情報を更新する
     * @param PostDomain $postDomain
     * @param Collection|Post $post
     * @return void
     */
    public function update(PostDomain $postDomain, Collection|Post $post): void
    {
        $post->title   = $postDomain->getTitle();
        $post->content = $postDomain->getContent();
        $post->user_id = $postDomain->getUserId();
        $post->update();
    }

    /**
     * 投稿の削除
     * @param int $postId
     * @param array $users
     * @return void
     * @throws \Exception
     */
    public function delete(int $postId, array $users): void
    {
        $post = $this->post
            ->whereIn("user_id", $users)
            ->find($postId);
        if(is_null($post)){
            throw new \Exception("post_id: ".$postId . " 投稿が存在しません");
        }
        $post->delete();
    }

    /**
     * IDを使用して投稿を絞る
     * @param int $postId
     * @param array $users
     * @return Builder|Collection|Model
     * @throws \Exception
     */
    public function findById(int $postId, array $users): Builder|Collection|Model
    {
        $post = $this->post->with("user")
            ->whereIn("user_id", $users)
            ->find($postId);
        if (is_null($post)) {
            throw new \Exception($postId . ": post_idが存在しません");
        }
        return $post;
    }

    /**
     * タイトルとページネーションで取得
     * @param string $title
     * @param int $pageNation
     * @param array $users
     * @return array
     */
    public function findByTitle(string $title, int $pageNation, array $users): array
    {
        return $this->post->with("user")
                    ->whereIn("user_id", $users)
                    ->where("title", "like", "%". $title ."%")
                    ->paginate(20, ['*'], 'page', $pageNation)
                    ->toArray();
    }

    /**
     * 投稿データをページネーションで取得
     * @param int $pageNation
     * @param array $users
     * @return array
     */
    public function getWithUserUsingPageNation(int $pageNation, array $users): array
    {
        return $this->post->with("user")
            ->whereIn("user_id", $users)
            ->paginate(20, ['*'], 'page', $pageNation)
            ->toArray();
    }

    /**
     * ユーザーIDで投稿の検索
     * @param int $userId
     * @param int $pageNation
     * @return array
     */
    public function findByUserId(int $userId, int $pageNation): array
    {
        return $this->post->with("user")
            ->where("user_id", "=", $userId)
            ->paginate(20, ['*'], 'page', $pageNation)
            ->toArray();
    }


    /**
     * 所属グループの最新の投稿を10個取得する
     * @param array $users
     * @return array
     */
    public function findByLatest(array $users): array
    {
        return $this->post->with("user")
            ->whereIn("user_id", $users)
            ->orderBy('id', 'DESC')
            ->take(10)
            ->get()
            ->toArray();
    }

    /**
     * 日付で検索
     * @param string $time 2018-08-03
     * @param array $users
     * @return array
     */
    public function findByCreatedAt(string $time, array $users): array
    {
        return $this->post->with("user")
            ->whereIn("user_id", $users)
            ->whereDate('created_at', '=', $time)
            ->get()
            ->toArray();
    }

    /**
     * 投稿データを全て取得する
     * @param array $users
     * @return array
     */
    public function getAll(array $users): array
    {
        return $this->post::with("user")
            ->whereIn("user_id", $users)
            ->get()
            ->toArray();
    }
}
