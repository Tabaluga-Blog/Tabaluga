<header>
    
    <div class="left">
        <img class="logo" src="images/Logo.png">
        <h1 class="title" href="magic.php">Tabaluga</h1>
    </div>

    <div class="right">
        <ul>
            <textarea class="searchbar" maxlength="40" placeholder="Find"></textarea>
            <!-- If logged -->
            <?php if(!isset($_SESSION['user'])) { ?>
                <a href="login.php">Log in</a>
                <a href="register.php">Register</a>
            
            <!-- If not logged -->
            <?php } else { ?>
                <a href="profile.php"><?php echo $_SESSION['user']->getName(); ?></a>
                <a href="logout.php">Log out</a>
            <?php } ?>
        </ul>
    </div>
</header>

<?php require 'Sidebar.php'; ?>
