<?php require  'includes/config.php' ?>
<?php require 'includes/head_section.php' ?>
<?php require  'includes/navbar.php' ?>

<div class="wrapper">
    <form class="form-signin" autocomplete="off" method="post" action="includes/register_user.php" >
        <h2 class="form-signin-heading">Sing up for <span>FREE</span></h2>
        <input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />
        <input type="text" class="form-control" name="username" placeholder="User name" required="" autofocus="" />
        <input type="password" class="form-control" name="password1" placeholder="Password" required=""/>
        <input type="password" class="form-control" name="password2" placeholder="Password" required=""/>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="register_btn">Sing up</button>
        <h1 style="color:red; font-size: 1em;"> <?php if (isset($_GET['error'])) echo $_GET['error'] ?> </h1>
    </form>
</div>
