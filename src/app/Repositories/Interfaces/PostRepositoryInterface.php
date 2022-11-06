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
     * @param array $users
     * @return array
     */
    public function getWithUserUsingPageNation(int $pageNation, array $users): array;

    /**
     * 投稿データを全て取得する
     * @param array $users
     * @return array
     */
    public function getAll(array $users): array;

    /**
     * IDを使用して投稿を絞る
     * @param int $postId
     * @param array $users
     * @return Builder|Collection|Model
     * @throws \Exception
     */
    public function findById(int $postId, array $users): Builder|Collection|Model;

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
     * @param array $users
     * @return void
     * @throws \Exception
     */
    public function delete(int $postId, array $users): void;

    /**
     * タイトルとページネーションで取得
     * @param string $title
     * @param int $pageNation
     * @param array $users
     * @return array
     */
    public function findByTitle(string $title, int $pageNation, array $users): array;

    /**
     * ユーザーIDで投稿の検索
     * @param int $userId
     * @param int $pageNation
     * @return array
     */
    public function findByUserId(int $userId, int $pageNation): array;

    /**
     * 所属グループの最新の投稿を10個取得する
     * @param array $users
     * @return array
     */
    public function findByLatest(array $users): array;

    /**
     * 日付で検索
     * @param string $time 2018-08-03
     * @param array $users
     * @return array
     */
    public function findByCreatedAt(string $time, array $users): array;
}
