<?php 
include_once "php/config.php";
session_start();
if(!isset($_SESSION["unique_id"])) // if user not a unique_id on their session, then
{
    header("location: login.php"); // redirect user to login.php
}
?>

<?php include_once "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="users">
            <header>
            <?php 
                $data = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if($data) 
                {
                    $row = mysqli_fetch_assoc($data);
                }
            ?>
                <div class="content">
                    <img src="images/<?=$row["image"]?>" alt="profil">
                    <div class="details">
                        <span><?= $row["first_name"] . ' ' . $row["last_name"] ?></span>
                        <p><?= $row["status"] ?></p>
                    </div>
                </div>
                <a href="#" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">Select A User to start chat!</span>
                <input type="text" placeholder="Enter Name to search..." name="query">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
                <!-- <a href="#">
                    <div class="content">
                        <img src="slime300th.jpeg" alt="">
                        <div class="details">
                            <span>Coding Nepal</span>
                            <p>This is test message</p>
                        </div>
                    </div>
                    <div class="status-dot"><i class="fas fa-circle"></i></div>
                </a> -->
            </div>
        </section>
    </div>

    <script src="javascript/users.js"></script>
</body>
</html>