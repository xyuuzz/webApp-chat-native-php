<?php

session_start();
include_once "config.php";
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);

if(!empty($email) && !empty($password)) // jika field email & pass terisi ...
{
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        $unique_email = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'"); // get data user
        if(mysqli_num_rows($unique_email)) // if data user is include in database
        {
            $row = mysqli_fetch_assoc($unique_email);
            mysqli_query($conn, "UPDATE users SET status = 'Active Now'");
            $_SESSION["unique_id"] = $row["unique_id"];
            echo "success";
        }
        else
        {
            echo "Your email or password is invalid!";
        }
    }
    else 
    {
        echo "Please Input A valid email";
    }
}
else 
{

}