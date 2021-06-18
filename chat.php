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
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="slime300th.jpeg" alt="">
                <div class="details">
                    <span>Coding Nepal</span>   
                    <p>Active Now</p>
                </div>
            </header>

            <div class="chat-box">
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elitadasdasda</p>
                    </div> 
                </div>
                <div class="chat incoming">
                    <img src="slime300th.jpeg" alt="">
                    <div class="details">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. </p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elitadasdasda</p>
                    </div> 
                </div>
                <div class="chat incoming">
                    <img src="slime300th.jpeg" alt="">
                    <div class="details">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. </p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elitadasdasda</p>
                    </div> 
                </div>
                <div class="chat incoming">
                    <img src="slime300th.jpeg" alt="">
                    <div class="details">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. </p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elitadasdasda</p>
                    </div> 
                </div>
                <div class="chat incoming">
                    <img src="slime300th.jpeg" alt="">
                    <div class="details">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. </p>
                    </div>
                </div>
            </div>

            <form action="#" class="typing-area">
                <input type="text" placeholder="Type a message here...">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>

</body>
</html>