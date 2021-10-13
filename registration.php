<?php include 'config.php' ?>
<?php include_once(ROOT_PATH . '\classes\Authentication.php')?>
<?php require 'includes/head_section.php' ?>
<?php include 'includes/navbar.php' ?>

<div class="wrapper">
    <div class="form_align">

        <form class="form-signin" autocomplete="off" method="post" action="register_user.php" >
            <h2 class="form-signin-heading">Sing up for <span>FREE</span></h2>
            <input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />
            <input type="text" class="form-control" name="username" placeholder="User name" required="" autofocus="" />
            <input type="password" class="form-control" name="password1" placeholder="Password" required=""/>
            <input type="password" class="form-control" name="password2" placeholder="Password" required=""/>

            <button class="btn btn-lg btn-primary btn-block" type="submit" name="register_btn">Sing up</button>
            <h1 style="color:red; font-size: 1em;"> <?php if ( isset($_SESSION['error']) ) echo $_SESSION['error'] ?> </h1>
        </form>

        <?php include_once 'includes\made_by.php'?>
    </div>
</div>

<?php classes\Error::clear_error_session(); ?>
