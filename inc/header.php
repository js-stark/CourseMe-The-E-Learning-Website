<?php
    include("inc/function.php");
?>

<div class="header">
    <div class="up_head">
        <div class="link">
            <?php echo head_link();?> 
        </div>
        <div class="date">
            <p><?php echo date('l, d F Y'); ?></p>
        </div>
        <div class="slog">
            <p>Experience Education Online</p>
        </div>

    </div>

    <div class="title">
        <h1><a href="index.php">CourseMe</a></h1>
    </div>
    <div class="menu">
        <h1><i class="fas fa-bars"></i></h1>
        <?php include ("inc/cat_menu.php");?>
    </div>
    <div class="head_search">
        <form method="post" enctype="multipart/form-data">
            <input type="search" name="query" placeholder="Search Subjects Here">
            <button name="search"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <div class="head_cart">
        <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>0</span></a>
    </div>
    <div class="head_login">
        <h4><i class="fas fa-user"></i><a class="log" href="user_login/index.php">Student Login</a></h4>
        
    </div>
    <div class="head_signup">
    <h4><i class="fas fa-user-plus"></i><a class="log" href="admin/index.php">Admin</a></h4>
    </div>
</div>  