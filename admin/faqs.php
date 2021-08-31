<div class="bodyright">

    <?php 
    if(isset($_GET['edit_cat'])){
        echo edit_cat();
    }
    else{ 
    ?>
    <h3>View All FAQs</h3>
    <div class="add">
        <details style="width:20%">
            <summary>Add FAQs</summary>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="text" name="qsn" placeholder="Enter The Question  Here">
                <textarea name="ans" placeholder="Enter The Answer Here" cols="30" rows="10"></textarea>
                <center><button name="add_faqs">Add FAQS</button></center>
            </form>
        </details><br/>

        <?php
            echo view_faqs(); 
        ?>
    </div>
</div>

<?php echo add_faqs(); } ?>