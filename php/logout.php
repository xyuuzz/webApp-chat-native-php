<?php

session_start();
include_once "config.php";
// update status user
$user = mysqli_query($conn, "UPDATE users SET status = 'Offline now' WHERE unique_id = {$_SESSION['unique_id']}");
session_unset(); // unset/delete session
session_destroy(); 