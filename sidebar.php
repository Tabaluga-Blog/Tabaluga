<?php
if (isset($_SESSION['user'])) {
    ?>

<aside class="sidebar">
    <ul>
        <div class="dropDown">
            <a href="index.php"><h3>Home</h3></a>
        </div>
    </ul>
    
    <ul>
        <div class="dropDown">
            <a href="post.php"><h3>Make Post</h3></a>
        </div>
    </ul>
    
    <ul>
        <div class="dropDown">
            <h3>Dashboard <span class="fa fa-arrow-circle-down" aria-hidden="true"></span></h3>
            <div class="container">
                <a href="profile.php"><li>My posts</li></a>
                <a href="#"><li>Favorite posts</li></a>
                <a href="#"><li>Drafts</li></a>
            </div>
        </div>
    </ul>

    <ul>
        <div class="dropDown">
            <h3>Mailbox <span class="fa fa-arrow-circle-down" aria-hidden="true"></span></h3>
            <div class="container">
                <a href="#"><li>Inbox</li></a>
                <a href="#"><li>Outbox</li></a>
                <a href="#"><li>Send Message</li></a>
            </div>
        </div>
    </ul>

    <ul>
        <div class="dropDown">
            <h3>Follows <span class="fa fa-arrow-circle-down" aria-hidden="true"></span></h3>
            <div class="container">
                <a href="#"><li>My follows</li></a>
                <a href="#"><li>My followers</li></a>
            </div>
        </div>
    </ul>

    <ul>
        <div class="dropDown">
            <a href="editProfile.php"><h3>Edit Profile</h3></a>
        </div>
    </ul>        
</aside>

<?php
}
?>
