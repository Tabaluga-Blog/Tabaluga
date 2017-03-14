<?php

namespace Adapter;

use Data\User;

interface DatabaseConnectionInterface
{
    public static function db();

    public function makePost(User $user, string $title, string $content, int $category);

    public function getCategoryName($cat_id);

    public function getPosts();

    public function getPostById($id);

    public function getCategories();

    public function getSearchedPosts($search);
}