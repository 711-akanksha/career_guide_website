<?php
session_start();

$invali=false;
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] === "POST")
{
    require 'connecttodb.php';
    $email=$_POST["email"];
    $pass=$_POST["password"];

        // Prepare a select statement
        //$sql="SELECT * from users where username=$username AND password= $password"
       $sql = sprintf("SELECT * FROM sign_up WHERE email= '%s'",
       $con->real_escape_string($_POST["email"]));
    // $result = $con->query($sql);
    // $user=$result->fetch_assoc();
       $result= $con->query($sql);
       $user=$result->fetch_assoc();
        
       if ($user){
       if (password_verify($pass,$user['password'])){
        $_SESSION['username']=$username;
       header("location: welcome.php");
       echo"successful";
       }
       else
       echo"<script>alert('please check your email and password')</script>";
    }
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

<style>
   
    {
    color: whitesmoke;
    box-sizing: border-box;
    display: flex;
    align-items: center;
    justify-content: center;
    }
    .main-su-container
    {
    text-decoration: none;
    background:linear-gradient(rgba(0, 0, 0, 0.5),  rgba(0, 0, 0, 0.5 )), url(/img/pexels-pavel-danilyuk-7944061.jpg);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    background-attachment: fixed;
    width: 100vw;
    height: 100vh;    
        height: 100vh;    
    height: 100vh;    
    }
    .blur-img{
      background: rgba(57, 52, 52,0.5);
      backdrop-filter: blur(15px);
      position: absolute;
      height: 100vh;
      width: 100%;
      z-index: 1;
    }
    .form
    {
        color: crimson;
    }
    .head1{
       
        margin-left:500px;
        text-align: center;
    }
    .main-su-container h1 
    {
        margin: 20px;
        position: relative;
        z-index: 1;
        color: antiquewhite;
    }
     .signup-container
     {
       
      position: absolute;
        z-index: 2;
        border: 2px;
        display: flex;
        justify-content: center;
        align-items: center; 
        width: 70vw;
        height: 80vh; 
        margin-top: 15px;
        margin-bottom: 30px; 
        margin-left:10vw ;
        border-radius: 20px;
    }
    .signup
    {
        display: flex;
        justify-content: left;
        align-items:initial;
        flex-direction:column; 
    }
    .pass,.username,.Qualification,
    .email,.cpass
    {

        font-size: 15px;
        padding: 13px;
        border:  2px solid whitesmoke;
        margin-bottom: 5px;
        font-size: medium;
        border: 0.01px solid olive;
        margin-bottom: 10px;
    }
    input{
      width: 50vw;
    }
  
    .sub-button
    {
        border-style: hidden;
        margin-top: 10px;
        font-size: 20px;
        padding: 5px;
        background-color:  olive;
        outline: none;
    }
    .sub-button:hover
    {
        background-color: darkgreen ;
    }
    .abs-div
    {
        width: 50px; 
        height: 50px;
        background-color: white;
    }
    .form-cont{
        width:50vw;
    }
    .slink{
        color-blue;
        font-size:20px;
    }
 .slink:hover{
    background-color:white;
 }
 .fgtpas{
    color:#fff;
    text-decoration:underline;
 }
</style>
</head>
<body>

    <div class="main-su-container">

   <div class ="blur-img"></div>
    <h1 class="head1" >log in </h1>
      <div class="signup-container">
     <form class="signup" onsubmit="return validate()" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
     <div class="form-cont">
       

        Email Address: <input type="text" id ="mail"class=" email" placeholder="email address" name="email">
        <br><span class="form" id="emailAdder"></span>

        Password: <input type="password" id="pwrd" class=" pass" placeholder="password" name="password">
        <br><span class="form" id ="passworder"></span>
        <button class="sub-button"> login in </button>
        <span class="fgtpas"><a herf="#">forget password</a></span>
        <p> or <span> do not have account <a href="/html/sign-in.html" class="slink">Sign in</a></span></p>
        </div>
    </form>
      
      </div>
    </div>
 </div>

  </div>
 
</body>
</html>