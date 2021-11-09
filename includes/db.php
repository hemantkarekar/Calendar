<?php
$host = "localhost";

 $username = "alogicda_mycal";
$password ="pass@word1";
$dbname ="alogicda_calendar"; 
$con = mysqli_connect($host,$username,$password,$dbname);

if($con){
    // echo "Success";
}
else{
    echo "Failed to Connect to Database";
}
?>