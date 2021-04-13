<?php


namespace App\Controller;

use App\Database\Database;

class PeopleController
{
    private $con;

    public function __construct()
    {
        $this->con = (new Database())->con;
    }

    // Insert man data into man table
    public function insertData($post)
    {
        $name = $this->con->real_escape_string($_POST['name']);
        $email = $this->con->real_escape_string($_POST['email']);
        $phone = $this->con->real_escape_string($_POST['phone']);
        $parent_id = $this->con->real_escape_string($_POST['parent_id']);
        $query="INSERT INTO peoples(name,email,phone,parent_id) VALUES('$name','$email','$phone','$parent_id')";

        $sql = $this->con->query($query);
        if ($sql==true) {
            header("Location:index.php?msg1=insert");
        }else{
            echo "Registration failed try again!";
        }
    }

    // Fetch man records for show listing
    public function displayData()
    {
        $query = "SELECT a.*, b.name as parent_name 
        FROM peoples a
        LEFT JOIN peoples b 
        ON b.id = a.parent_id";

        $result = $this->con->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }


    // Delete man data from man table
    public function deleteRecord($id)
    {
        $query = "DELETE FROM peoples WHERE id = '$id'";
        $sql = $this->con->query($query);
        if ($sql==true) {
            header("Location:index.php?msg3=delete");
        }else{
            echo "Record does not delete try again";
        }
    }

}