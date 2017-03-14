<?php

namespace DB;

use Data\User;

interface DBConnectInterface
{
    public static function db();

    public function makePost(User $user, string $title, string $content, int $category);

    public function getCategoryName($cat_id);

    public function getPosts();

    public function getPostById($id);

    public function getCategories();

    public function getSearchedPosts($search);
}