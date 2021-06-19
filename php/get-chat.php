<?php

session_start();
include_once "config.php";

$pengirim = mysqli_real_escape_string($conn, $_POST["pengirim"]);
$penerima = mysqli_real_escape_string($conn, $_POST["penerima"]);

$output = "";
$user_penerima = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = $penerima");
$row_user_penerima = mysqli_fetch_assoc($user_penerima);

$get_chat = mysqli_query($conn, "SELECT * FROM messages 
                                -- LEFT JOIN users ON messages.penerima_id = users.unique_id
                                WHERE 
                                pengirim_id = $pengirim AND penerima_id = $penerima
                                OR 
                                pengirim_id = $penerima AND penerima_id = $pengirim
                                ORDER BY id ASC");

if(mysqli_num_rows($get_chat))
{
    while($row = mysqli_fetch_assoc($get_chat))
    {
        if($row["penerima_id"] == $penerima)
        {
            $output .= 
            '
                <div class="chat outgoing">
                    <div class="details">
                        <p>' . $row["message"] . '</p>
                    </div> 
                </div>
            ';
        }
        else 
        {
            $output .= 
            '
                <div class="chat incoming">
                    <img src="images/' . $row_user_penerima["image"] . '" alt="photo">
                    <div class="details">
                        <p>' . $row["message"] . '</p>
                    </div>
                </div>
            ';
        }
    }
}

echo $output;