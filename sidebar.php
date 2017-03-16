<?php

use Services\PostServices\PostService;

if (isset($_SESSION['user'])) {
    ?>

<aside class="sidebar">
    <ul>
        <div class="dropDown">
            <a href="/home.php"><h3>Home</h3></a>
        </div>
    </ul>
    <ul>
        <div class="dropDown">
            <h3>My Profile<span class="fa fa-arrow-circle-down" aria-hidden="true"></span></h3>
            <div class="container">
                <a href="/User/editProfile.php"><li>Edit Profile</li></a>
                <a href="/User/deleteProfile.php"><li>Delete Profile</li></a>
            </div>
        </div>
    </ul>
    <ul>
        <div class="dropDown">
            <a href="/Post/create.php"><h3>Make Post</h3></a>
        </div>
    </ul>

    <ul>
        <div class="dropDown">
            <h3>Dashboard <span class="fa fa-arrow-circle-down" aria-hidden="true"></span></h3>
            <div class="container">
                <a href="/../User/profile.php?id=<?= $_SESSION['user']->getId(); ?>"><li>My posts</li></a>
                <a href="#"><li>Favorite posts</li></a>
                <a href="#"><li>Drafts</li></a>
            </div>
        </div>
    </ul>

    <ul>
        <div class="dropDown">
            <h3>Mailbox <span class="fa fa-arrow-circle-down" aria-hidden="true"></span></h3>
            <div class="container">
                <a href="/Chat/inbox.php"><li>Inbox</li></a>
                <a href="/Chat/message.php"><li>Send Message</li></a>
            </div>
        </div>
    </ul>

    <ul>
        <div class="dropDown">
            <h3>Category <span class="fa fa-arrow-circle-down" aria-hidden="true"></span></h3>
            <div class="container">
                <?php
                    $postService = new PostService();
                    $categories = $postService->getCategories();

                    foreach ($categories as $category) {
                        ?> <a href="#"><li><?php echo $category['name']?></li></a> <?php
                    }

             ?>
            </div>
    </ul>
</aside>
<?php
}
?>
