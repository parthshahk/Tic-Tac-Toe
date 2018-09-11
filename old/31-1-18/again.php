<?php
    $con=mysqli_connect("localhost","parth","parth","parth");
    $changed=$_GET['q'];
    $id=$_GET['id'];
    mysqli_query($con,"UPDATE ttt SET last='0' WHERE ID=$id");
?>