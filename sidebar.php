<?php
if (isset($_SESSION['user'])) {
    ?>

<aside class="sidebar">
            <ul>
                <div class="dropDown">
                    <h3>Profile <span class="fa fa-arrow-circle-down" aria-hidden="true"></span></h3>
                    <div class="container">
                        <a href="profile.php"><li>My profile</li></a>
                        <a href="post.php"><li>Make post</li></a>
                        <a href="#"><li>Favorite posts</li></a>
                        <a href="#"><li>Drafts</li></a>
                    </div>
                </div>
            </ul>

            <ul>
                <div class="dropDown">
                    <h3>Message <span class="fa fa-arrow-circle-down" aria-hidden="true"></span></h3>
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
                        <a href="#"><li>Subscribtions</li></a>
                        <a href="#"><li>My subscribers</li></a>
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
