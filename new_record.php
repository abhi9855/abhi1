<?php
session_start();
if (isset($_SESSION['userid'])) {
    $usrid = $_SESSION['userid'];

    include 'functions.php';

    if (isset($_POST["add"])) {
        $id = $_POST['id'];
        $url1 = $_POST['Whisky_Exchnage_Url'];
        $url2 = $_POST['Master_Of_Malt_Url'];
        $url3 = $_POST['DrinkSupermarket_Url'];
        $url4 = $_POST['Other_Site_Url'];
        $url5 = $_POST['url5'];
        //print_r($_POST); die();
        $crud->insert('cms', "LIQROO_ID = '$id',URL1 = '$url1',URL2 = '$url2',URL3 = '$url3',URL4 = '$url4',URL5 = '$url5',Last_Updated_By = '$usrid'", $conn);

    }
    if (isset($_POST['view'])) {

        header("location:index.php");

    }
    include_once 'body.php';
} else {
    header("Location: login.php");
}
