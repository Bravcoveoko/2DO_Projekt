<?php include_once(ROOT_PATH . '\classes\Authentication.php')?>
<?php use classes\Authentication; ?>
<nav class="navbar navbar-expand-lg">
    <a href="index.php">
        <img src="images/Logo.png" width="70" height="70" class="d-inline-block align-top" alt="">
    </a>
    <a class="navbar-brand" href="#">2DO app  |</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tutorial.php">Tutorial</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php  if ( !Authentication::is_Authed() ): ?>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="registration.php">Registration</a>
            </li>
            <?php endif;?>


            <?php if ( Authentication::is_Authed() ): ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="activity_board.php"><?php echo Authentication::get_current_user_username() . '\'s '?> activity board</a>
                </li>
            <?php endif;?>



        </ul>
    </div>
</nav>