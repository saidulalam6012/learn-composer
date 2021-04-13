
<?php
require('includes/header.php');

use App\Controller\peopleController;
$peopleObj = new peopleController();

// Delete record from table
if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $peopleObj->deleteRecord($_GET['deleteId']);
}
?>
<div class="container">
    <h1>List<a href="create.php" class="btn btn-primary" style="float:right;">Add New Record</a></h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>phone</th>
            <th>parent</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($peopleObj->displayData() as $people){
            ?>
            <tr>
                <td><?php echo $people['id'] ?></td>
                <td><?php echo $people['name'] ?></td>
                <td><?php echo $people['email'] ?></td>
                <td><?php echo $people['phone'] ?></td>
                <td><?php echo $people['parent_name'] ?></td>
                <td>
                    <a href="index.php?deleteId=<?php echo $people['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<?php
require('includes/footer.php');
?>