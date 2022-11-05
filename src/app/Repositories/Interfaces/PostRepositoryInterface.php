<?php

namespace App\Repositories\Interfaces;

use App\Domains\PostDomain;
use App\Domains\UserDomain;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * App\UseCases;
 */


interface PostRepositoryInterface
{
    /**
     * 投稿データをページネーションで取得
     * @param int $pageNation
     * @return array
     * @throws \Exception
     */
    public function getWithUserUsingPageNation(int $pageNation): array;

    /**
     * 投稿データを全て取得する
     * @return array
     * @throws \Exception
     */
    public function getAll(): array;

    /**
     * IDを使用して投稿を絞る
     * @param int $postId
     * @return Builder|Collection|Model
     * @throws \Exception
     */
    public function findById(int $postId): Builder|Collection|Model;

    /**
     * 投稿情報を保存する
     * @param PostDomain $postDomain
     * @return void
     */
    public function save(PostDomain $postDomain): void;

    /**
     * 投稿情報を更新する
     * @param PostDomain $postDomain
     * @param Collection|Post $post
     * @return void
     */
    public function update(PostDomain $postDomain, Collection|Post $post): void;

    /**
     * 投稿の削除
     * @param int $postId
     * @return void
     */
    public function delete(int $postId): void;
}
