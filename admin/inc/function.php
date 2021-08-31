<?php

function add_lang(){
    include("inc/db.php");

    if(isset($_POST['add_lang'])){
        $lang_name = $_POST['lang_name'];
        $check = $con->prepare("select * from lang where lang_name='$lang_name'");
        $check->setFetchMode(PDO:: FETCH_ASSOC);
        $check->execute();
        $count = $check->rowCount();

        if($count==1){
                echo "<script>alert('Language Already Added ')</script>";
                echo "<script>window.open('index.php?lang','_self')</script>";
        }
        else{
            $add_cat = $con->prepare("insert into lang(lang_name) values('$lang_name')");

            if($add_cat->execute()){
                echo "<script>alert('Language added succesfully')</script>";
                echo "<script>window.open('index.php?lang','_self')</script>";
            }
            else{
                echo "<script>alert('Language NOT added succesfully')</script>";
                echo "<script>window.open('index.php?lang','_self')</script>";
            }

        }


    }
}

function edit_lang(){
    include("inc/db.php");

    if(isset($_GET['edit_lang'])){
        $id = $_GET['edit_lang'];

        $get_cat = $con->prepare("select * from lang where lang_id='$id'");
        $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $get_cat->execute();
        $row = $get_cat->fetch();
        echo'
            <h3>Edit Language</h3> 
            <form class="edit_form" action="" method="post" enctype="multipart/form-data">
                <input type="text" name="l_name" value="'.$row["lang_name"].'" placeholder="Enter Language Name Here">
                <center><button name="edit_lang">Edit Category</button></center>
            </form>';

        if(isset($_POST['edit_lang'])){
            $cat_name = $_POST['l_name'];

            $check = $con->prepare("select * from lang where lang_name='$cat_name'");
            $check->setFetchMode(PDO:: FETCH_ASSOC);
            $check->execute();
            $count = $check->rowCount();

            if($count==1){
                    echo "<script>alert('Language Already Added ')</script>";
                    echo "<script>window.open('index.php?lang','_self')</script>";
            }
            else{

                $up = $con->prepare("update lang set lang_name='$cat_name' where lang_id='$id'");

                if($up->execute()){
                    echo "<script>alert('Language Updated succesfully')</script>";
                    echo "<script>window.open('index.php?lang','_self')</script>";
                }
                else{
                    echo "<script>alert('Language NOT updated succesfully')</script>";
                    echo "<script>window.open('index.php?lang','_self')</script>";
                }

            }

        }
    }
}

function view_lang(){
    include("inc/db.php");
    $get_lang = $con->prepare("select * from lang");
    $get_lang->execute();
    $get_lang->setFetchMode(PDO:: FETCH_ASSOC);
    $i=1;
    while($row=$get_lang->fetch()):
        echo"<tr>
            <td>".$i++."</td>
            <td>".$row['lang_name']."</td>  
            <td>
                <a href='index.php?lang&edit_lang=".$row['lang_id']."' title='Edit'><i class='fas fa-edit'></i></a>
                <a style='color:#f00' href='index.php?lang&del_lang=".$row['lang_id']."'  title='Delete'><i class='fas fa-trash-alt'></i></a>
            </td>  
        </tr>";
    endwhile;

    if(isset($_GET['del_lang'])){
        $id=$_GET['del_lang'];

        $del = $con->prepare("delete from lang where lang_id='$id'");
        if($del->execute()){
            echo"<script>alert('Language Deleted Succesfully')</script>";
            echo"<script>window.open('index.php?lang','_self')</script>";
        }
        else{
            echo"<script>alert('Language NOT Deleted Succesfully')</script>";
            echo"<script>window.open('index.php?lang','_self')</script>";
        }
    }

}

    function add_cat(){
        include("inc/db.php");

        if(isset($_POST['add_cat'])){
            $cat_name = $_POST['cat_name'];
            $check = $con->prepare("select * from cat where cat_name='$cat_name'");
            $check->setFetchMode(PDO:: FETCH_ASSOC);
            $check->execute();
            $count = $check->rowCount();

            if($count==1){
                    echo "<script>alert('Category Already Added ')</script>";
                    echo "<script>window.open('index.php?cat','_self')</script>";
            }
            else{
                $add_cat = $con->prepare("insert into cat(cat_name) values('$cat_name')");

                if($add_cat->execute()){
                    echo "<script>alert('Category added succesfully')</script>";
                    echo "<script>window.open('index.php?cat','_self')</script>";
                }
                else{
                    echo "<script>alert('Category NOT added succesfully')</script>";
                    echo "<script>window.open('index.php?cat','_self')</script>";
                }

            }


            
        }
    }

    function edit_cat(){
        include("inc/db.php");

        if(isset($_GET['edit_cat'])){
            $id = $_GET['edit_cat'];

            $get_cat = $con->prepare("select * from cat where cat_id='$id'");
            $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
            $get_cat->execute();
            $row = $get_cat->fetch();
            echo'
                <h3>Edit Category</h3> 
                <form class="edit_form" action="" method="post" enctype="multipart/form-data">
                    <input type="text" name="cat_name" value="'.$row["cat_name"].'" placeholder="Category Name Here">
                    <center><button name="edit_cat">Edit Category</button></center>
                </form>';

            if(isset($_POST['edit_cat'])){
                $cat_name = $_POST['cat_name'];

                $check = $con->prepare("select * from cat where cat_name='$cat_name'");
                $check->setFetchMode(PDO:: FETCH_ASSOC);
                $check->execute();
                $count = $check->rowCount();
    
                if($count==1){
                        echo "<script>alert('Category Already Added ')</script>";
                        echo "<script>window.open('index.php?cat','_self')</script>";
                }
                else{

                    $up = $con->prepare("update cat set cat_name='$cat_name' where cat_id='$id'");

                    if($up->execute()){
                        echo "<script>alert('Category Updated succesfully')</script>";
                        echo "<script>window.open('index.php?cat','_self')</script>";
                    }
                    else{
                        echo "<script>alert('Category NOT updated succesfully')</script>";
                        echo "<script>window.open('index.php?cat','_self')</script>";
                    }

                }

            }
        }
    }

    function view_cat(){
        include("inc/db.php");
        $get_cat = $con->prepare("select * from cat");
        $get_cat->execute();
        $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $i=1;
        while($row=$get_cat->fetch()):
            echo"<tr>
                <td>".$i++."</td>
                <td>".$row['cat_name']."</td>  
                <td>
                    <a href='index.php?cat&edit_cat=".$row['cat_id']."' title='Edit'><i class='fas fa-edit'></i></a>
                    <a style='color:#f00' href='index.php?cat&del_cat=".$row['cat_id']."' title='Delete'><i class='fas fa-trash-alt'></i></a>
                </td>  
            </tr>";
        endwhile;

        if(isset($_GET['del_cat'])){
            $id=$_GET['del_cat'];

            $del = $con->prepare("delete from cat where cat_id='$id'");
            if($del->execute()){
                echo"<script>alert('Category Deleted Succesfully')</script>";
                echo"<script>window.open('index.php?cat','_self')</script>";
            }
            else{
                echo"<script>alert('Category NOT Deleted Succesfully')</script>";
                echo"<script>window.open('index.php?cat','_self')</script>";
            }
        }

    }

    function add_sub_cat(){
        include("inc/db.php");

        if(isset($_POST['add_sub_cat'])){
            $cat_name = $_POST['sub_cat_name'];
            $cat_id = $_POST['cat_id'];
            $check = $con->prepare("select * from sub_cat where sub_cat_name='$cat_name'");
            $check->setFetchMode(PDO:: FETCH_ASSOC);
            $check->execute();
            $count = $check->rowCount();

            if($count==1){
                    echo "<script>alert('Sub Category Already Added ')</script>";
                    echo "<script>window.open('index.php?sub_cat','_self')</script>";
            }
            else{
                $add_cat = $con->prepare("insert into sub_cat(sub_cat_name,cat_id) values('$cat_name','$cat_id')");

                if($add_cat->execute()){
                    echo "<script>alert('Sub Category added succesfully')</script>";
                    echo "<script>window.open('index.php?sub_cat','_self')</script>";
                }
                else{
                    echo "<script>alert('Sub Category NOT added succesfully')</script>";
                    echo "<script>window.open('index.php?sub_cat','_self')</script>";
                }

            }


            
        }
    }

    function edit_sub_cat(){
        include("inc/db.php");

        if(isset($_GET['edit_sub_cat'])){
            $id = $_GET['edit_sub_cat'];

            $get_cat = $con->prepare("select * from sub_cat where sub_cat_id='$id'");
            $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
            $get_cat->execute();
            $row = $get_cat->fetch();

            $cat_id = $row['cat_id'];
            $get_c = $con->prepare("select * from cat where cat_id='$cat_id'");
            $get_c->setFetchMode(PDO:: FETCH_ASSOC);
            $get_c->execute();
            $row_cat = $get_c->fetch();

            echo'
                <h3>Edit Sub Category</h3> 
                <form class="edit_form" action="" method="post" enctype="multipart/form-data">
                    <select name="c_id" id="">;
                        <option value='.$row_cat["cat_id"].'>'.$row_cat["cat_name"].'</option>';
                        echo select_cat();
                echo'</select>
                    <input type="text" name="sub_cat_name" value="'.$row["sub_cat_name"].'" placeholder="Category Name Here">
                    <center><button name="edit_sub_cat">Edit Category</button></center>
                </form>';

            if(isset($_POST['edit_sub_cat'])){
                $cat_name = $_POST['sub_cat_name'];
                $cat_id = $_POST['c_id'];
               
                    $up = $con->prepare("update sub_cat set sub_cat_name='$cat_name',cat_id='$cat_id' where sub_cat_id='$id'");

                    if($up->execute()){
                        echo "<script>alert('Category Updated succesfully')</script>";
                        echo "<script>window.open('index.php?sub_cat','_self')</script>";
                    }
                    else{
                        echo "<script>alert('Category NOT updated succesfully')</script>";
                        echo "<script>window.open('index.php?sub_cat','_self')</script>";
                    }
    
            }
        }
    }

    function view_sub_cat(){
        include("inc/db.php");
        $get_cat = $con->prepare("select * from sub_cat");
        $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $get_cat->execute();
        $i=1;
        while($row=$get_cat->fetch()):

            $id = $row['cat_id'];
            $get_c = $con->prepare("select * from cat where cat_id='$id'");
            $get_c->setFetchMode(PDO:: FETCH_ASSOC);
            $get_c->execute();
            $row_cat = $get_c->fetch();

            echo"<tr>
                <td>".$i++."</td>
                <td>".$row['sub_cat_name']."</td>  
                <td>".$row_cat['cat_name']."</td>  
                <td>
                    <a href='index.php?sub_cat&edit_sub_cat=".$row['sub_cat_id']."' title='Edit'><i class='fas fa-edit'></i></a> 
                    <a style='color:#f00' href='index.php?sub_cat&del_sub_cat=".$row['sub_cat_id']."' title='Delete'><i class='fas fa-trash-alt'></i></a>
                </td>  
            </tr>";
        endwhile;

        if(isset($_GET['del_sub_cat'])){
            $id=$_GET['del_sub_cat'];

            $del = $con->prepare("delete from sub_cat where sub_cat_id='$id'");
            if($del->execute()){
                echo"<script>alert('Sub Category Deleted Succesfully')</script>";
                echo"<script>window.open('index.php?sub_cat','_self')</script>";
            }
            else{
                echo"<script>alert('Sub Category NOT Deleted Succesfully')</script>";
                echo"<script>window.open('index.php?sub_cat','_self')</script>";
            }
        }

    }





    function select_cat(){
        include('inc/db.php');
        $get_cat = $con->prepare("select * from cat");
        $get_cat->execute();
        while($row=$get_cat->fetch()):
            echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
        endwhile;
    }

    function add_term(){
        include("inc/db.php");

        if(isset($_POST['add_term'])){
            $cat_name = $_POST['term'];
            $cat_id = $_POST['for_whom'];
            $check = $con->prepare("select * from term where term='$cat_name'");
            $check->setFetchMode(PDO:: FETCH_ASSOC);
            $check->execute();
            $count = $check->rowCount();

            if($count==1){
                    echo "<script>alert('Terms Already Added ')</script>";
                    echo "<script>window.open('index.php?terms','_self')</script>";
            }
            else{
                $add_cat = $con->prepare("insert into term(term,for_whom) values('$cat_name','$cat_id')");

                if($add_cat->execute()){
                    echo "<script>alert('Terms added succesfully')</script>";
                    echo "<script>window.open('index.php?terms','_self')</script>";
                }
                else{
                    echo "<script>alert('Terms NOT added succesfully')</script>";
                    echo "<script>window.open('index.php?terms','_self')</script>";
                }

            }


            
        }
    }

    function edit_term(){
        include("inc/db.php");

        if(isset($_GET['edit_term'])){
            $id = $_GET['edit_term'];

            $get_cat = $con->prepare("select * from term where t_id='$id'");
            $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
            $get_cat->execute();
            $row = $get_cat->fetch();

    

            echo'
                <h3>Edit T&C</h3> 
                <form class="edit_form" action="" method="post" enctype="multipart/form-data">
                    <select name="for_whom" id="">;
                        <option value='.$row["for_whom"].'>'.$row["for_whom"].'</option>          
                        <option value="Student">Student</option>
                        <option value="Teacher">Teacher</option>';
                        
                echo'</select>
                    <input type="text" name="term" value="'.$row["term"].'" placeholder="Category Name Here">
                    <center><button name="edit_t">Edit T&C</button></center>
                </form>';

            if(isset($_POST['edit_t'])){
                $cat_name = $_POST['term'];
                $cat_id = $_POST['for_whom'];
               
                    $up = $con->prepare("update term set term='$cat_name',for_whom='$cat_id' where t_id='$id'");

                    if($up->execute()){
                        echo "<script>alert('Terms Updated succesfully')</script>";
                        echo "<script>window.open('index.php?terms','_self')</script>";
                    }
                    else{
                        echo "<script>alert('Term NOT updated succesfully')</script>";
                        echo "<script>window.open('index.php?terms','_self')</script>";
                    }
    
            }
        }
    }


    function view_term(){
        include("inc/db.php");
        $get_c = $con->prepare("select * from term ");
        $get_c->setFetchMode(PDO:: FETCH_ASSOC);
        $get_c->execute();
        $i=1;
        while($row = $get_c->fetch()):

            echo"<tr>
                <td>".$i++."</td>
                <td>".$row['term']."</td>  
                <td>".$row['for_whom']."</td>  
                <td>
                    <a href='index.php?terms&edit_term=".$row['t_id']."' title='Edit'><i class='fas fa-edit'></i></a> 
                    <a style='color:#f00' href='index.php?terms&del_term=".$row['t_id']."' title='Delete'><i class='fas fa-trash-alt'></i></a>
                </td>  
            </tr>";
        endwhile;
        if(isset($_GET['del_term'])){
            $id=$_GET['del_term'];

            $del = $con->prepare("delete from term where t_id='$id'");
            if($del->execute()){
                echo"<script>alert('Term Deleted Succesfully')</script>";
                echo"<script>window.open('index.php?terms','_self')</script>";
            }
            else{
                echo"<script>alert('Terms NOT Deleted Succesfully')</script>";
                echo"<script>window.open('index.php?','_seltermsf')</script>";
            }
        }

    }

    function contact(){
        include("inc/db.php");

        $get_con=$con->prepare("select * from contact ");
        $get_con->setFetchMode(PDO:: FETCH_ASSOC);
        $get_con->execute();
        $row=$get_con->fetch();

        echo'

        <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Update Contact No</td>
                <td><input type="tel" value="'.$row["phn"].'" name="phn"></td>
            </tr>
            <tr>
                <td>Update Email</td>
                <td><input type="email" value="'.$row["email"].'" name="email"></td>
            </tr>
            <tr>
                <td>Update Office Address 1</td>
                <td><input type="text" value="'.$row["add1"].'" name="add1"></td>
            </tr>
            <tr>
                <td>Update Office Address 2</td>
                <td><input type="text" value="'.$row["add2"].'" name="add2"></td>
            </tr>
            <tr>
                <td>youtube Channel Address</td>
                <td><input type="text" value="'.$row["yt"].'" name="yt"></td>
            </tr>
            <tr>
                <td>Facebook</td>
                <td><input type="text" value="'.$row["fb"].'" name="fb"></td>
            </tr>
            <tr>
                <td>Google Plus</td>
                <td><input type="text" value="'.$row["gp"].'" name="gp"></td>
            </tr>
            <tr>
                <td>Twitter</td>
                <td><input type="text" value="'.$row["tw"].'" name="tw"></td>
            </tr>
            <tr>
                <td>Linked In</td>
                <td><input type="text" value="'.$row["link"].'" name="ln"></td>
            </tr>
        </table>
        
        <center><button name="up_con">Save Data</button></center>
    </form>';

    if(isset($_POST['up_con'])){

        $phn = $_POST['phn'];
        $email = $_POST['email'];
         $add1 = $_POST['add1'];
        $add2 = $_POST['add2'];
        $yt = $_POST['yt'];
        $fb = $_POST['fb'];
        $gp = $_POST['gp'];
        $tw = $_POST['tw'];
        $ln = $_POST['ln'];

        $up = $con->prepare("update contact set phn='$phn',email='$email',add1='$add1',add2='$add2',yt='$yt',fb='$fb',gp='$gp',tw='$tw',link='$ln'");

        if($up->execute()){
            echo "<script>alert('updated Succesfully')</script>";
            echo "<script>window.open('index.php?contact','_self')</script>";
        }

    }

    
    }

    function add_faqs(){
        include("inc/db.php");

        if(isset($_POST['add_faqs'])){
            $qsn = $_POST['qsn'];
            $ans = $_POST['ans'];
            $check = $con->prepare("select * from faqs where qsn='$qsn'");
            $check->setFetchMode(PDO:: FETCH_ASSOC);
            $check->execute();
            $count = $check->rowCount();

            if($count==1){
                    echo "<script>alert('FAQs Already Added ')</script>";
                    echo "<script>window.open('index.php?faqs','_self')</script>";
            }
            else{
                $add_cat = $con->prepare("insert into faqs(qsn,ans) values('$qsn','$ans')");

                if($add_cat->execute()){
                    echo "<script>alert('FAQs added succesfully')</script>";
                    echo "<script>window.open('index.php?faqs','_self')</script>";
                }
                else{
                    echo "<script>alert('FAQs NOT added succesfully')</script>";
                    echo "<script>window.open('index.php?faqs','_self')</script>";
                }

            }


            
        }
    }

    function view_faqs(){
        include("inc/db.php");
        $get_faqs = $con->prepare("select * from faqs");
        $get_faqs->setFetchMode(PDO:: FETCH_ASSOC);
        $get_faqs->execute();
        while($row=$get_faqs->fetch()):
            echo'
            <details>
                <summary>'.$row['qsn'].'</summary>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" name="up_qsn" value="'.$row['qsn'].'" placeholder="Enter The Question  Here">
                    <input type="hidden" name="id" value="'.$row['q_id'].'">
                    <textarea name="up_ans"  placeholder="Enter The Answer Here" cols="30" rows="10">'.$row['ans'].'</textarea>
                    <center><button name="up_faqs">Update FAQS</button></center>
                </form>
            </details><br/>';
        endwhile;

        if(isset($_POST['up_faqs'])){
            $qsn = $_POST['up_qsn'];
            $ans = $_POST['up_ans']; 
            $id = $_POST['id'];
            $up_faq = $con->prepare("update faqs set qsn='$qsn',ans='$ans' where q_id='$id'");

            if($up_faq->execute()){
                echo "<script>alert('FAQs Updated succesfully')</script>";
                echo "<script>window.open('index.php?faqs','_self')</script>";
            }
            else{
                echo "<script>alert('FAQs NOT updated succesfully')</script>";
                echo "<script>window.open('index.php?faqs','_self')</script>";
            }
            
        }
        
    }

    function about(){
        include("inc/db.php");
        $about = $con->prepare("select * from about");
        $about->setFetchMode(PDO:: FETCH_ASSOC);
        $about->execute();
        $row = $about->fetch();

        echo'<form method="POST">
                <textarea name="about" >'.$row['about'].'</textarea>
                <button name="up_about">Save</button>
            </form>';

        if(isset($_POST['up_about'])){
            $info = $_POST['about'];
            $up_about = $con->prepare("update about set about='$info'");
            if($up_about->execute()){
                echo "<script>window.open('index.php?about','_self')</script>";
            }
            else{
                echo "<script>alert('Info NOT updated succesfully')</script>";
                echo "<script>window.open('index.php?about','_self')</script>";
            }
        }
    }

    
?>

