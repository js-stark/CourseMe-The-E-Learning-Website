<?php

    function head_link(){
        include("inc/db.php");
        $get_link = $con->prepare("select * from contact");
        $get_link->setFetchMode(PDO::FETCH_ASSOC);
        $get_link->execute();
        $row=$get_link->fetch(); // Row Variable to fetch data from database Table!!
        
        echo'
        <ul>
            <li><a target="_blank" href="https://www.facebook.com/'.$row['fb'].'"><i class="fab fa-facebook-f"></i></a></li>
            <li><a target="_blank" href="https://www.twitter.com/'.$row['tw'].'"><i class="fab fa-twitter"></i></a></li>
            <li><a target="_blank" href="https://www.google.com/'.$row['gp'].'"><i class="fab fa-google-plus"></i></a></li>
            <li><a target="_blank" href="https://www.youtube.com/'.$row['yt'].'"><i class="fab fa-youtube"></i></a></li>
            <li><a target="_blank" href="https://www.linkedin.com/'.$row['link'].'"><i class="fab fa-linkedin"></i></a></li>
        </ul>
        '; 
    }

    function cat_menu(){
        include("inc/db.php");
        $get_cat = $con->prepare("select * from cat");
        $get_cat->setFetchMode(PDO::FETCH_ASSOC);
        $get_cat->execute(); 
        while($row=$get_cat->fetch()):
            echo'<li><a href="#"><i class="'.$row['icon'].'"></i>'.$row['cat_name'].'</a></li>';
        endwhile; 
    }
    function home_cat(){
        include("inc/db.php");
        $get_cat = $con->prepare("select * from cat limit 5");
        $get_cat->setFetchMode(PDO::FETCH_ASSOC);
        $get_cat->execute(); 
        while($row=$get_cat->fetch()):
            echo'<li>
                    <a href="#">
                        <center>
                            <i class="'.$row['icon'].'"></i>
                            <h4>'.$row['cat_name'].'</h4>
                            <p>2</p>
                        </center>
                    </a>
                </li>';
        endwhile; 
    }

    function cart(){
        include("inc/db.php");
        echo'
            <div class="crumb">
                <span><a href="index.php">Home</a></span> <b>></b>
                <span>My Cart</span>
            </div>
            <div class="cart">

            </div><br clear="all" />';
    }

?>