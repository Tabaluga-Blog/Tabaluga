<?php

namespace Services\PostServices;

interface PostServiceInterface
{
    public function makePost($userId, string $title, string $content, int $category, $isDraft);

    public function getCategoryName($cat_id);

    public function getPosts();

    public function getPostById($id);

    public function getCategories();

    public function getSearchedPosts($search);
}