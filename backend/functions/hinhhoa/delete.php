<?php
    include_once('../../../connectdb.php');
    $ma=$_GET['hSP_ma'];
    $sql="DELETE FROM hinhsanpham WHERE hSP_ma=$ma";
    $result=mysqli_query($conn,$sql);
    header('location: index.php');
?>