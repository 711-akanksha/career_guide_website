<?php
require_once 'connecttodb.php';
$username_err = $password_err = $confirm_password_err = $email_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // print the data coming from form
    print_r($_POST); 
     // Define variables and initialize with empty values
$username = $password = $confirm_password = $email=  "";
$qualification = trim($_POST['quali']);


   
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT * FROM sign_up WHERE username = ? or email= ? ";
        
     
        if($stmt=$con->prepare($sql)){
           
            $param_username = trim($_POST["username"]);
            // Bind variables to the prepared statement as parameters
            $param_email= trim($_POST['email']);
            $stmt->bind_param("ss", $param_username, $param_email);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();

                if($stmt->num_rows == 1){
                   
                    echo"<script>alert('email or username is taken')</script>";
                } else{
                    $username = trim($_POST["username"]);
                    $email = trim($_POST['email']);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
             // Close statement
        $stmt->close();
        }

 
    }
    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";
   }
    else if(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } 
    else{
        $password = trim($_POST['password']);
    }
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }
   
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err)){

        // Prepare an insert statement
        
        $sql = "INSERT INTO sign_up (username, email, password, qualification) VALUES (?,?,?,?)";
     
        if($stmt =  $con->prepare($sql)){
                        // Set parameters
            if(!$stmt){
                die("error occured");
            }
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_email = $email;
            $param_qualification = $qualification;
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssss", $param_username , $param_email , $param_password , $param_qualification);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
              header("location: welcome.php");
              $_SESSION['username']=$username;
              exit; 
            } else
            {
                die($con->error."".$con->errno);
            }
             // Close statement
        $stmt->close();
        }
 }

    // Close connection
    $con->close();
}
?>

<!-- htlm  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign in</title>
    <link rel="stylesheet" href="\css\nav.css">
    <link rel="stylesheet" href="\career_guidance\css\register.css">
</head>
<body>

    <div class="main-su-container">

   <div class ="blur-img"></div>
    <h1 style="text-align: center;">Sign up </h1>
      <div class="signup-container">
     <form class="signup" onsubmit="return validate()" action="login_register.php" method="post">
     <div class="form-cont">
        Username:<input class ="username" id="user"placeholder ="please enter your username" name="username">
       <br> <span class="form" id="usernameerror"><?php echo"$username_err";?></span>
   

        Email Address: <input type="text" id ="mail"class=" email" placeholder="email address" name="email">
        <br><span class="form" id="emailAdder"><?php echo"$email_err ";?></span>

        Password: <input type="password" id="pwrd" class=" pass" placeholder="password" name="password">
        <br><div><span class="form" id ="passworder"><?php echo"$password_err";?></span></div>

        Confirm Password: <input type="password" id="cpwrd"  class=" cpass" placeholder="confirm password" name="confirm_password" >
        <br> <span  class="form"id="confirm passworder"><?php echo"$confirm_password_err";?></span>

        Qualification:<input type="text" id="qual" class ="Qualification" placeholder =" enter latest qualification" name = "quali">
        <br> <span  class="form" id ="Qualificationer"></span>  
        <input  class="sub-button"type="submit">
        <!-- <button class="sub-button">Register</button> -->
        <p> or <span>already have account <a href="/html/sign-in.html" class="slink">Sign in</a></span></p>
        </div>
    </form>
      
      </div>
    </div>
 </div>

  </div>
 
</body>
</html>