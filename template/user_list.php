<?php

while ($row = mysqli_fetch_assoc($users)) {
    $pengirim = $_SESSION["unique_id"];
    $message_w_user = mysqli_query($conn, "SELECT * FROM messages 
                                            WHERE (pengirim_id = $pengirim OR penerima_id = $pengirim)
                                            AND
                                            (pengirim_id = {$row['unique_id']} OR penerima_id = {$row['unique_id']})
                                            ORDER BY id DESC LIMIT 1");
    if(mysqli_num_rows($message_w_user)) 
    {
        $row_message = mysqli_fetch_assoc($message_w_user);
        $last_message = 
        ($row_message["pengirim_id"] == $pengirim ? "You : " : "") # Jika user yang terakhir mengirim pesan, maka tambahkan you
        .
        (strlen($row_message["message"]) > 20 ?  # jika pesan lebih dari 20 huruf, maka stop dan tambahkan ...
        substr($row_message["message"], 0, 20) . "..."       :       $row_message["message"]);
    }
    else // jika tidak ada pesan di kedua user 
    {
        $last_message = "No message availble";
    }

    $offline = $row["status"] === "Offline now" ? "offline" : "";

    $output .=
    '
        <a href="chat.php?user_id='. $row["unique_id"] .'">
            <div class="content">
                <img src="images/' . $row["image"] .'" alt="">
                <div class="details">
                    <span>'. $row["first_name"] . ' ' . $row["last_name"] .'</span>
                    <p>' . $last_message . '</p>
                </div>
            </div>
            <div class="'. $offline .' status-dot"><i class="fas fa-circle"></i></div>
        </a>
    ';
}