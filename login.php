<?php
$name = $_GET["usrname"];
$pass = $_GET["pass"];
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="assets/css/layouts.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <main role="main">
        <?php include "includes/db.php";
        $result = $con->query("SELECT * FROM users");
        $f = 0;
        while ($row = $result->fetch_assoc()) {
            if ($name == $row['username'] && $pass == $row['password']) {
                $f = 1;
                $_SESSION["username"] = $row['username'];
            }
        }
        if($f==1){
            
                $target;
                if($name == "Admin"){
                    $target = "admin.php";
                }
                else{
                    $target = "editor.php";
                }
                echo "<script>location.href='".$target."';</script>";
        }   
        else {
                echo "Login Failed".$name.$pass;
        }
        ?>
    </main>
</body>

</html>