<?php

namespace Services\PostServices\PostServicesInterfaces;

interface MakePostServiceInterface
{
    public function makePost($title, $content, $userId, $category);
}