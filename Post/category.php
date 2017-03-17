<?php 

use Services\PostServices\PostService;

require_once '../Data/User.php';
require_once '../Data/Post.php';
require_once '../Services/PostServices/PostService.php';
require_once '../Access/notLogged.php';

if (!isset($_GET['category'])) {
    $categories = new PostService();

    $allCategories = $categories->getCategories();
    require_once '../views/categories.view.php';
    
} elseif (is_numeric($_GET['category']) && $_GET['category'] >= 1 && $_GET['category'] <= 8) {

    require_once '../views/categories.view.php';

} else {
    header("Location: /Post/category.php");
    exit;
}

require_once '../footer.php';