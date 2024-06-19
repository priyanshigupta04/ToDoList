<?php
include 'config.php';
if(isset($_GET['delete'])){
    $nid=$_GET['id'];

    $query = "DELETE FROM awdtb WHERE p_id = '$nid' ";

    $data = mysqli_query($conn,$query);

    if($data) {
        echo "<script>alert('recored is deleted')</script>";
        echo "<script>window.location.href = 'practical_09.php';</script>";
        exit(); 
    } else {
        echo "Failed to update";
    }
    
    

}

?>