
<div class="bodyleft">
    <h3>Category Management</h3>
    <ul>
        <li><a href="index.php"><i class="fas fa-home"></i>Dashboard</a></li>
        <li><a href="index.php?cat"><i class="fas fa-th"></i>View Course categories</a></li>
        <li><a href="index.php?sub_cat">View Course Sub Categories</a></li>
        <li><a href="index.php?lang">View Languages</a></li>
    </ul>

    <h3>Course Management</h3>
    <ul>
        <li><a href="#">Active Courses</a></li>
        <li><a href="#">Pending Courses</a></li>
        <li><a href="#">Unpublished Courses</a></li>
        <li><a href="#">Advanced Course Searching</a></li>
    </ul>

    <h3>User Management</h3>
    <ul>
        <li><a href="#">View All Students</a></li>
        <li><a href="#">View All Teachers</a></li>
        <li><a href="#">Advanced User Search</a></li>
    </ul>

    <h3>Payment Management</h3>
    <ul>
        <li><a href="#">Pay to Teachers</a></li>
        <li><a href="#">Complete Payment</a></li>
        <li><a href="#">Advanced Order Search</a></li>
    </ul>
    <h3>Pages Management</h3>
    <ul>
        <li><a href="index.php?terms">Terms & Conditions Page</a></li>
        <li><a href="index.php?contact">Contact Us Page</a></li>
        <li><a href="index.php?about">About Us Page</a></li>
        <li><a href="index.php?faqs">FAQs Page</a></li>
        <li><a href="#">Edit Slider</a></li>
    </ul>

</div>

<?php

    if(isset($_GET['cat'])){
        include("cat.php");
    }

    if(isset($_GET['lang'])){
        include("lang.php");
    }
    if(isset($_GET['sub_cat'])){
        include("sub_cat.php");
    }
    if(isset($_GET['terms'])){
        include("terms.php");
    }
    if(isset($_GET['contact'])){
        include("contact.php");
    }
    if(isset($_GET['faqs'])){
        include("faqs.php");
    }
    if(isset($_GET['about'])){
        include("about.php");
    }

?>
