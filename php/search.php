<?php

session_start();
include_once "config.php";
$query = mysqli_real_escape_string($conn, $_POST["searchTerm"]);

// cari user yang sama bagian depan atau belakang nama dan yang unique_id nya berbeda dari unique_id user yang login
$users = mysqli_query($conn, "SELECT * FROM users WHERE 
                        unique_id != {$_SESSION['unique_id']} AND first_name LIKE '%{$query}%' 
                        OR 
                        unique_id != {$_SESSION['unique_id']} AND last_name LIKE '%{$query}%'
                    ");

$output = "";
if(mysqli_num_rows($users))
{
    include_once "../template/user_list.php";
}
else 
{
    $output .= 
    "
        <p style='text-align:center;'>User Not Found</p>
    ";
}

echo $output;