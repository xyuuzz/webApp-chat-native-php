<?php

session_start();
include_once "config.php";
$first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
$last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);


if(!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password))
{
    // check email field is valir or not, (email22 = not valid, email22@gmail.com == valid)
    if(filter_var($email, FILTER_VALIDATE_EMAIL))  
    {
        $unique_email = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
        // if unique email 
        if(!mysqli_num_rows($unique_email)) 
        {
            $image = $_FILES["image"];

            // if user was uplade email
            if(isset($image)) 
            {
                $image_name = $image["name"]; // get name of image
                $image_type = $image["type"]; // get type of image
                $tmp_name = $image["tmp_name"]; //temp image 

                $img_ext = end(explode(".", $image_name)); // get ext image 
                $valid_ext = ["jpeg", "jpg", "png"]; // valid extension

                // if ext image is a valid ext 
                if(in_array($img_ext, $valid_ext))  
                { 
                    $time = time();
                    $new_img_name = $time . $image_name;
                    // die( __DIR__.'/../../images/'. $_FILES["image"]['name']);
                    //if uplading img to our folder successfully

                    if(move_uploaded_file($tmp_name, "../images/" . $new_img_name)) 
                    { 
                        $status = "Active now"; // once user signed up then this status will be Active now.
                        $random_id = rand(time(), 1000000); // create a random id for active user.

                        // lets insert all user data to database
                        $insert_data = mysqli_query($conn, "INSERT INTO users 
                            (unique_id, first_name, last_name, email, password, image, status) 
                            VALUES ($random_id, '$first_name', '$last_name', '$email', '$password', '$new_img_name', '$status')");

                        // if data successfully insert to database
                        if($insert_data) 
                        { 
                            $user_data = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
                            if(mysqli_num_rows($user_data)) 
                            {
                                $row = mysqli_fetch_assoc($user_data);
                                $_SESSION["unique_id"] = $row["unique_id"]; // number session for user login.
                                echo "success"; // success
                            } 
                            else 
                            {
                                echo "Something went wrong!";
                            }
                        } 
                        else // if data failed to insert to database
                        { 
                            echo "Something went wrong!";
                        }
                    } 
                    else 
                    {
                        echo "Something went wrong ";
                    }
                } 
                else // if extension image will user uplade is invalid
                {
                    echo "Your Extension Image is invalid - valid extension : jpg, jpeg & png";
                }
            } 
            else // if email is empty
            { 
                echo "Please Select an Image File";
            }
        } 
        else  //if email already exist
        {
            echo "$email - This email already exist";
        }
    } 
    else  // if email field is not a valid email
    {
        echo "Please Input A valid email";
    }
} 
else // if one of input is empty
{ 
    echo "All input file is required";
}