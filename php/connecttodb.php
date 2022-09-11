<?php 
// //connection to database
// $server_name='localhost';
//     $db_user ='root';
//     $db_upass='';
//     $db_db='login_reg';
//     //try connecting
//     $con = mysqli_connect($server_name,$db_user,$db_upass,$db_db);
//     //check connection
//     if($con == false){
//         die("connection failed".mysqli_connect_error());
// }
// else {
//     echo "connection success";
// }


define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'regitration');
define('DB_SERVER', 'localhost');

/* Attempt to connect to MySQL database */
//     $con = mysqli_connect($server_name,$db_user,$db_upass,$db_db);
$con= new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


// Check connection
if($con->connect_errno){
    die("ERROR: Could not connect. (" .$con->connect_errno. ") " . $con->connect_error);
 
}

?>

