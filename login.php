<?php 
include_once "header.php"; 

session_start();
if(isset($_SESSION["unique_id"]))
{
    header("location: users.php");
}
?>

<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Realtime Chat App</header>

            <form action="#" method="POST">
                <div class="error-txt">This is A Error Message!</div>
                <div class="name-details"></div>
                    <div class="field input">
                        <label for="email">Email Addres</label>
                        <input type="email" id="email" placeholder="Enter You Email Addres" required name="email">
                    </div>
                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" id="password" placeholder="Enter Your Password Account" required name="password">
                        <i class="fas fa-eye"></i>
                    </div>
                <div class="field input submit">
                    <input type="submit" value="Login">
                </div>
            </form>

            <div class="link">Not yet Signup? <a href="index.php">Signup Now!</a></div>
        </section>
    </div>

    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
</body>
</html>
