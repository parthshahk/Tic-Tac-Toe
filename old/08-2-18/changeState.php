<?php
    //$con=mysqli_connect("localhost","parth","parth","parth");
    $con=mysqli_connect("mysql.hostinger.in","u696737897_parth","`7w4]8io`aR8xu1AB1","u696737897_datab");
    $changed=$_GET['q'];
    $id=$_GET['id'];
    mysqli_query($con,"UPDATE ttt SET last='$changed' WHERE ID=$id");
?>