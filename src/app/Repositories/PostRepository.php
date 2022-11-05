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
        $post = [
            "title"   => $postDomain->getTitle(),
            "content" => $postDomain->getContent(),
            "user_id" => $postDomain->getUserId(),
        ];
        $this->post::insert($post);
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
     * @return void
     */
    public function delete(int $postId): void
    {
        $post = $this->post->find($postId);
        $post->delete();
    }

    /**
     * IDを使用して投稿を絞る
     * @param int $postId
     * @return Builder|Collection|Model
     * @throws \Exception
     */
    public function findById(int $postId): Builder|Collection|Model
    {
        $post = $this->post->with("user")->find($postId);
        if (is_null($post)) {
            throw new \Exception($postId . ": post_idが存在しません");
        }
        return $post;
    }

    /**
     * 投稿データをページネーションで取得
     * @param int $pageNation
     * @return array
     * @throws \Exception
     */
    public function getWithUserUsingPageNation(int $pageNation): array
    {
        $post = $this->post->with("user")->paginate(20, ['*'], 'page', $pageNation);
        if (count($post) === 0) {
            throw new \Exception( "投稿がありません");
        }
        return $post->toArray();
    }

    /**
     * 投稿データを全て取得する
     * @return array
     * @throws \Exception
     */
    public function getAll(): array
    {
        $post = $this->post::with("user")->get();
        if (count($post) === 0) {
            throw new \Exception( "投稿がありません");
        }
        return $post->toArray();
    }
}
