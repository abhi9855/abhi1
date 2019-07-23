<?php
include_once('config.php');
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
class crud
{
    public $table_name, $field_value, $conn;

    //Data Insert Function
    public function insert($table_name, $field_value, $conn)
    {
        $insertrecord = "INSERT INTO " . $table_name . " set " . $field_value;
        $sql = mysqli_query($conn, $insertrecord);

        if (!$sql) {
            echo "<script>alert('Record Not inserted');</script>" . mysqli_error($conn);
            //die("Insertion failed").mysqli_error($this->con);
        } else {
            echo "<script>alert('Record inserted');</script>";
        }
    }

    //Data View Function
    public function view($table_name, $conn)
    {
        $selectrecord = "SELECT * FROM " . $table_name;
        $sql = mysqli_query($conn, $selectrecord);
        return $sql;
    }

    //Data updation Function
    public function update($id, $table_name, $field_value, $conn)
    {
        $updaterecord = mysqli_query($conn, "UPDATE " . $table_name . " set " . $field_value . " WHERE LIQROO_ID=" . $id);
        return $updaterecord;

    }

    //Data Deletion function Function
    public function delete($id, $table_name, $conn)
    {
        $deleterecord = mysqli_query($conn, "DELETE FROM " . $table_name . " WHERE LIQROO_ID =" . $id);
        return $deleterecord;
    }

    public function update_data($id, $table_name, $conn)
    {

        $field = mysqli_query($conn, "SELECT * FROM " . $table_name . " WHERE LIQROO_ID =" . $id);
        // echo'<pre>'; print_r("SELECT * FROM ".$table_name." WHERE id =".$id); die();
        return $field;
    }
}
$crud = new crud;
