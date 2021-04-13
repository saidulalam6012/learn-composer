<?php
require('includes/header.php');

use App\Controller\peopleController;

$peopleObj = new peopleController();

// Insert Record in customer table
if(isset($_POST['submit'])) {
    $peopleObj->insertData($_POST);
}
?>
<div class="container">
    <form method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Enter name" required="">
        </div>
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email" required="">
        </div>
        <div class="form-group">
            <label for="email">Phone:</label>
            <input type="text" class="form-control" name="phone" placeholder="Enter email" required="">
        </div>
        <div class="form-group">
            <label for="email">Parent:</label>
            <select class="form-select" name="parent_id">
                <option selected>Open this select menu</option>
                <?php
                foreach ($peopleObj->displayData() as $people){
                 ?>
                    <option value="<?php echo $people["id"] ?>"><?php echo $people["name"] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
    </form>
</div>
<?php
require('includes/footer.php');
?>