<?php
include_once 'functions.php';
include_once 'header.php';
// echo  $_SESSION["userid"];
?>
<div class="container-fluid">
<div class="row list-rec">
    <div class="col-md-4">
        <h3>List of Records</h3>
    </div>
    <div class="col-md-6">
        <span id='ct' ></span>  
        
    </div>
    
    <div class="col-md-2">
        <button type="button" class="new-rec-button" onclick="newRecord()">+ NEW RECORD</button>
    </div>
</div>

<div class="row my-table">
 <div class=" table-responsive1">
  <table class="table table-hover " id="table">
    <thead>
      <tr>
        <th scope="col">LIQROO_ID</th>
        <th scope="col">URL1</th>
        <th scope="col">URL2</th>
        <th scope="col">URL3</th>
        <th scope="col">URL4</th>
        <th scope="col">URL5</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <?php
                if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                    $page_no = $_GET['page_no'];
                } else {
                    $page_no = 1;
                }
            
                $total_records_per_page = 10;
                $offset = ($page_no-1) * $total_records_per_page;
                $previous_page = $page_no - 1;
                $next_page = $page_no + 1;
                $adjacents = "2"; 

                // echo "<pre>";print_r($res_data);die("");
                // if(isset($_GET['query'])==""){
                $search = $_GET['query'];
                
                if ($search != "") {

                    $result_count = mysqli_query($conn,"SELECT count(*) As total_records FROM cms WHERE (`LIQROO_ID` LIKE '%" . $search . "%') OR (`URL1` LIKE '%" . $search . "%') OR (`URL2` LIKE '%" . $search . "%') OR (`URL3` LIKE '%" . $search . "%') OR (`URL4` LIKE '%" . $search . "%') OR (`URL5` LIKE '%" . $search . "%')");
                    
                    // $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `cms`");
                    $total_records = mysqli_fetch_array($result_count);
                    // print_r("SELECT count(*) FROM cms WHERE (`LIQROO_ID` LIKE '%" . $search . "%') OR (`URL1` LIKE '%" . $search . "%') OR (`URL2` LIKE '%" . $search . "%') OR (`URL3` LIKE '%" . $search . "%') OR (`URL4` LIKE '%" . $search . "%') OR (`URL5` LIKE '%" . $search . "%')");
                    // die();
                    // print_r($total_records);
                    // die();
                    $total_records = $total_records['total_records'];
                    
                    $total_no_of_pages = ceil($total_records / $total_records_per_page);
                    $second_last = $total_no_of_pages - 1; // total page minus 1

                    $sql = "SELECT * FROM cms WHERE (`LIQROO_ID` LIKE '%" . $search . "%') OR (`URL1` LIKE '%" . $search . "%') OR (`URL2` LIKE '%" . $search . "%') OR (`URL3` LIKE '%" . $search . "%') OR (`URL4` LIKE '%" . $search . "%') OR (`URL5` LIKE '%" . $search . "%')  LIMIT 
                    $offset, $total_records_per_page";
                    
                    // print_r("SELECT * FROM cms WHERE (`LIQROO_ID` LIKE '%" . $search . "%') OR (`URL1` LIKE '%" . $search . "%') OR (`URL2` LIKE '%" . $search . "%') OR (`URL3` LIKE '%" . $search . "%') OR (`URL4` LIKE '%" . $search . "%') OR (`URL5` LIKE '%" . $search . "%')  LIMIT 
                    // $offset, $no_of_records_per_page");
                    // die();
                    
                    $res_data = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($res_data) > 0) {

                    }
                    else { 				// if there is no matching rows do following
                        echo "<script>alert('No results');</script>";
                        echo "<script>window.location.href='index.php'</script>";
                    }
                } elseif ($search == "") {
                    $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `cms`");
                    $total_records = mysqli_fetch_array($result_count);
                    $total_records = $total_records['total_records'];
                    $total_no_of_pages = ceil($total_records / $total_records_per_page);
                    $second_last = $total_no_of_pages - 1; // total page minus 1
                
                    $sql = "SELECT * FROM cms LIMIT $offset, $total_records_per_page";

                    $res_data = mysqli_query($conn, $sql);
                }

                while ($fetch = mysqli_fetch_array($res_data)) {
            ?>
                    <!-- here goes the data -->
                        <tr>
                            <td>
                                
                                <?php echo $fetch['LIQROO_ID']; ?>
                            </td>

                            <td>
                                <a href="<?php echo $fetch['URL1']; ?>" target="_blank"><?php echo $fetch['URL1']; ?></a>

                            </td>

                            <td>
                                <a href="<?php echo $fetch['URL2']; ?>" target="_blank"><?php echo $fetch['URL2']; ?></a>

                            </td>

                            <td>
                                <a href="<?php echo $fetch['URL3']; ?>" target="_blank"><?php echo $fetch['URL3']; ?></a>

                            </td>

                            <td >
                                <a href="<?php echo $fetch['URL4']; ?>" target="_blank"><?php echo $fetch['URL4']; ?></a>

                            </td>

                            <td> 
                                <a href="<?php echo $fetch['URL5']; ?>" target="_blank"><?php echo $fetch['URL5']; ?></a>

                            </td>
                        
                            <td>
                                <!-- <button type = "submit" name = "update" value="<?=$fetch['id'];?>">Update</button>  -->
                                <a href="up.php?id=<?php echo $fetch['LIQROO_ID'].'&page_no='.$_GET['page_no'].'&query='.$_GET['query']; ?>"  class="btn btn-outline-success my-2 my-sm-0" style="width:80px;"><span class="glyphicon glyphicon-log-out"></span>edit</a>
                            </td>
                        </tr>
                     <!-- here the data end -->
            <?php
                }
                mysqli_close($conn);
                // echo"<script> console.log($page_ID); </script>";
            ?>
        </tr>  
    </tbody>
  </table>
</div>
</div>

<div class="row">
    <div class="col-md-12">
      <p class="page-count"><strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong></p>
    </div>
    <div class="col-md-12">
        <nav class=" my-pagi" aria-label="...">
            
                    <!-- pagination -->
                    <!-- Center-aligned -->
            <ul class="pagination my-pagi">
                <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
                
                <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
                    <a <?php if($page_no > 1){ echo "href='?page_no=".$previous_page."&query=".$_GET['query']."'"; } ?>>Previous</a>
                </li>
                
                <?php 
                  
                if ($total_no_of_pages <= 10){  	 
                    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                        if ($counter == $page_no) {
                             echo "<li class='active'><a>$counter</a></li>";
                        }else{
                            echo "<li><a href='?page_no=".$counter."&query=".$_GET['query']."'>$counter</a></li>";
                        }
                    }
                    
                }
                
                elseif($total_no_of_pages > 10){
                    if($page_no <= 4) {			
                        for ($counter = 1; $counter < 8; $counter++){		 
                            if ($counter == $page_no) {
                                echo "<li class='active'><a  href='?page_no=".$counter."&query=".$_GET['query']."'>$counter</a></li>";	
                            }else{
                                echo "<li><a href='?page_no=".$counter."&query=".$_GET['query']."'>$counter</a></li>";
                            }
                        }
                        echo "<li><a>...</a></li>";
                        echo "<li><a href='?page_no=".$second_last."&query=".$_GET['query']."'>$second_last</a></li>";
                        echo "<li><a href='?page_no=".$total_no_of_pages."&query=".$_GET['query']."'>$total_no_of_pages</a></li>";
                    }
                    elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
                        echo "<li><a href='?page_no=1&query=".$_GET['query']."'>1</a></li>";
                        echo "<li><a href='?page_no=2&query=".$_GET['query']."'>2</a></li>";
                        echo "<li><a>...</a></li>";
                        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
                            if ($counter == $page_no) {
                                echo "<li class='active'><a>$counter</a></li>";	
                            }else{
                                echo "<li><a href='?page_no=".$counter."&query=".$_GET['query']."'>$counter</a></li>";
                            }                  
                        }
                        echo "<li><a>...</a></li>";
                        echo "<li><a href='?page_no=".$second_last."&query=".$_GET['query']."'>$second_last</a></li>";
                        echo "<li><a href='?page_no=".$total_no_of_pages."&query=".$_GET['query']."'>$total_no_of_pages</a></li>";      
                    }
                    else {
                        echo "<li><a href='?page_no=1&query=".$_GET['query']."'>1</a></li>";
                        echo "<li><a href='?page_no=2&query=".$_GET['query']."'>2</a></li>";
                        echo "<li><a>...</a></li>";

                        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                            if ($counter == $page_no) {
                                echo "<li class='active'><a>$counter</a></li>";	
                            }else{
                               echo "<li><a href='?page_no=".$counter."&query=".$_GET['query']."'>$counter</a></li>";
                            }                   
                        }
                    }
                }
                ?>
                
                <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
                    <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=".$next_page."&query=".$_GET['query']."'"; } ?>>Next</a>
                </li>

                <?php 
                    if($page_no < $total_no_of_pages){
                        echo "<li><a href='?page_no=".$total_no_of_pages."&query=".$_GET['query']."'>Last &rsaquo;&rsaquo;</a></li>";
                    }
                ?>
            </ul>
        </nav>
    </div>
</div>
</div>
