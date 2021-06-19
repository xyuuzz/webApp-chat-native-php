<?php 
include_once "header.php"; 

session_start();
if(!isset($_SESSION["unique_id"]))
{
    header("location: login.php");
}
?>

<body>
    
    <div class="wrapper">
        <section class="chat-area">

            <header>
                <?php 
                    include_once "php/config.php";
                    $user_unique_id = $_SESSION["unique_id"];
                    $user_id = mysqli_real_escape_string($conn, $_GET["user_id"]);
                    $user = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = $user_id");
                    $row = mysqli_fetch_assoc($user);
                ?>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="images/<?=$row["image"]?>" alt="photo">
                <div class="details">
                    <span><?=$row["first_name"] . " " . $row["last_name"]?></span>   
                    <p><?=$row["status"]?></p>
                </div>
            </header>

            <div class="chat-box">
                <!-- <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elitadasdasdaaa</p>
                    </div> 
                </div>
                <div class="chat incoming">
                    <img src="slime300th.jpeg" alt="">
                    <div class="details">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. </p>
                    </div>
                </div> -->
            </div>

            <form action="#" class="typing-area" autocomplete="off" method="POST">
                <input type="text" placeholder="Type a message here..." name="message">
                <input type="text" name="pengirim" value="<?=$user_unique_id?>" hidden>
                <input type="text" name="penerima" value="<?=$user_id?>" hidden>
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>

    <script src="javascript/chat.js"></script>

</body>
</html>