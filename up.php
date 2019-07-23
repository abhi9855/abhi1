<?php
session_start();
if (isset($_SESSION['userid'])) {
    $usrid = $_SESSION['userid'];
    // include_once 'header.php';
    
    include_once 'functions.php';
    $id1 = $_GET['id'];
    $page_ID=$_GET['page_no'];
    $search=$_GET['query'];
    echo"<script> console.log($search); </script>";
    if (isset($id1)) {
        # code...
        $result = $crud->update_data($id1, "cms", $conn);
        $fetch = mysqli_fetch_assoc($result);
        $fetchid = $fetch['LIQROO_ID'];
        $fetchurl1 = $fetch['URL1'];
        $fetchurl2 = $fetch['URL2'];
        $fetchurl3 = $fetch['URL3'];
        $fetchurl4 = $fetch['URL4'];
        $fetchurl5 = $fetch['URL5'];

    }

    if (isset($_GET['edit'])) {
        $id = $_GET['id'];
        // echo "<script>alert($id);</script>";
        $url1 = $_GET['Whisky_Exchnage_Url'];
        $url2 = $_GET['Master_Of_Malt_Url'];
        $url3 = $_GET['DrinkSupermarket_Url'];
        $url4 = $_GET['Other_Site_Url'];
        $url5 = $_GET['url5'];

        $sql = $crud->update($id, 'cms', "URL1 = '$url1',URL2 = '$url2',URL3 = '$url3',URL4 = '$url4',URL5 = '$url5',Last_Updated_By = '$usrid'", $conn);
        
        if ($sql) {
            echo "<script>alert('Data Updated');</script>";
            // header("Location: index.php?page_no=".$_GET['page_no']."");
            echo "<script>window.location.href = 'index.php?page_no=".$page_ID."&query=".$search."'</script>";
            // echo "<script>window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Data Not Updated');</script>";
            echo "<script>window.location.href = 'up.php?page_no=".$page_ID."&id=".$id1."'</script>";
        }
    }
    ?>

<?php
// including update.php file responsible for data fetching
    include_once 'update.php';
} else {
    header("Location: login.php");
}
?>
	</form>
<?php
include_once 'footer.php';
?>
 