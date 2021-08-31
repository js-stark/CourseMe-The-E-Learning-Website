<div class="bodyright">
    <?php
        if(isset($_GET['edit_sub_cat'])){
            echo edit_sub_cat();
        }
        else{
    ?>
    <h3>View All Sub Categories</h3>
    <div class="add">
        <details>

            <summary>Add Sub Category</summary>
            <form action="" method="post" enctype="multipart/form-data">
                <select name="cat_id" id="">
                    <option value="">select Category</option>
                    <?php echo select_cat(); ?>
                </select>
                <input type="text" name="sub_cat_name" placeholder="Category Name Here">
                <center><button name="add_sub_cat">Add Sub Category</button></center>
            </form>
        </details>
        <table cellspacing="0">
            <tr>
                <th>Sr No.</th>
                <th>Sub Category Name</th>
                <th>Main category Name</th>
                <th>Action</th>
            </tr>
            <?php view_sub_cat()?>
        </table>
    </div>
    <?php } ?>
</div>

<?php
    echo add_sub_cat();
?>