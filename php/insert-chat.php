<?php

session_start();
include_once "config.php";
$message = mysqli_real_escape_string($conn, $_POST["message"]);
$pengirim = mysqli_real_escape_string($conn, $_POST["pengirim"]);
$penerima = mysqli_real_escape_string($conn, $_POST["penerima"]);

if(!empty($message))
{
    $insert_message = mysqli_query($conn, "INSERT INTO messages  # masukan data ke table message
                                    (pengirim_id, penerima_id, message) # id field berikut
                                    VALUES ($pengirim, $penerima, '$message')"); # dengan value berikut
    if($insert_message)
    {
        echo "mantab";
    }
    else 
    {
        echo "tidack mantab";
    }
}
