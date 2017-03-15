<?php

namespace Services\PostServices;

interface MakePostServiceInterface
{
    public function makePost($title, $content, $userId, $category, $isDraft);
}