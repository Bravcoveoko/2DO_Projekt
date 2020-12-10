
<nav class="navbar navbar-expand-lg">
    <a href="index.php">
        <img src="images/Logo.png" width="70" height="70" class="d-inline-block align-top" alt="">
    </a>
    <a class="navbar-brand" href="#">2DoIst</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php  if (!isset($_COOKIE['userName'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="registration.php">Registration</a>
            </li>
            <?php endif;?>


            <?php if (isset($_COOKIE['userName'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="includes/logout.php">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="activity_board.php"><?php echo $_COOKIE['userName'] . '\'s '?> activity board</a>
                </li>
            <?php endif;?>



        </ul>
    </div>
</nav>