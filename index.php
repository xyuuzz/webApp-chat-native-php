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

            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="error-txt">This is A Error Message!</div>
                    <div class="name-details">
                        <div class="field input">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" placeholder="First Name" required name="first_name">
                        </div>
                        <div class="field input">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" placeholder="Last Name" required name="last_name">
                        </div>
                    </div>
                    <div class="field input">
                        <label for="email">Email Addres</label>
                        <input type="email" id="email" placeholder="Enter You Email Addres" required name="email">
                    </div>
                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" id="password" placeholder="Enter Your Password Account" required name="password">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field image">
                        <label for="image">Select Image</label>
                        <input type="file" id="image" required name="image">
                    </div>
                <div class="field button">
                    <input type="submit" value="Continue to Chat">
                </div>
            </form>

            <div class="link">Already Sign Up? <a href="login.php">Login Now!</a></div>
        </section>
    </div>

    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>
</body>
</html>