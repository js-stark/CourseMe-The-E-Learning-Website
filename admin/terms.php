<div class="bodyright">

    <?php 
    if(isset($_GET['edit_term'])){
        echo edit_term();
    }
    else{ 
    ?>
    <h3>View All Terms&Conditions</h3>
    <div class="add">
        <details>

            <summary>Add New T&C</summary>
            <form action="" method="post" enctype="multipart/form-data">
                <select name="for_whom" required>
                    <option value="">Select Term Form</option>
                    <option value="Student">Student</option>
                    <option value="Teacher">Teacher</option>
                </select>
                <input type="text" name="term" placeholder="Enter Term Name Here">
                <center><button name="add_term">Add T&C</button></center>
            </form>
        </details>
        <table cellspacing="0">
            <tr>
                <th>Sr No.</th>
                <th>Terms</th>
                <th>For Whom</th>
                <th>Action</th>
            </tr>
            <?php echo view_term()?>
        </table>
    </div>
</div>

<?php echo add_term(); } ?>