<?php
session_start();
 print_r($_SESSION['username']);
echo "welcome";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user page</title>
    <link rel="stylesheet" href="\career_guidance\css\nav.css">
</head>
<body>
    <?php
    echo"<h1>weclome".$_SESSION['username']."</h1>";
   ?>
</body>
</html> 