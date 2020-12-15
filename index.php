<?php include 'includes/config.php' ?>
<?php require 'includes/head_section.php' ?>

<body>

<?php include 'includes/navbar.php'; ?>


<div class="container">
    <div class="info-content">
        <h1>Plan your<span id="words"> day</span></h1>
        <form action="tutorial.php">
            <button id="main_button" >Get started</button>
        </form>
    </div>
</div>


<canvas id="myCanvas"></canvas>


<script src="myJS/graphScript.js"></script>
<script src="myJS/changeWords.js"></script>

<?php include 'includes/footer.php'?>
</body>




