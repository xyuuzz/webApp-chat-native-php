<?php

session_start();
include_once "config.php";

$users = mysqli_query($conn, "SELECT * FROM users WHERE unique_id != {$_SESSION['unique_id']}");
$output = "";
if(mysqli_num_rows($users) >= 1)
{
   include_once "../template/user_list.php";
}
else 
{
    $output .= 
    "
        <p style='text-align:center;'>No Users are avaible to chat</p>
    ";
}

echo $output;
