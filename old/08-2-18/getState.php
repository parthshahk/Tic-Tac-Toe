<?php
    //$con=mysqli_connect("localhost","parth","parth","parth");
    $con=mysqli_connect("mysql.hostinger.in","u696737897_parth","`7w4]8io`aR8xu1AB1","u696737897_datab");
    $id=$_GET['id'];
    $current_info_obj=mysqli_query($con,"SELECT * FROM ttt WHERE ID=$id");
    $current_states=mysqli_fetch_array($current_info_obj,MYSQLI_NUM);
    echo $current_states[1];
?>