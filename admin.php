<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION["username"]; ?>'s Dashboard</title>
    <script src="assets/js/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/layouts.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a0b438cfb9.js" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q8YYX5CSXC"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-Q8YYX5CSXC');
    </script>
    </head>

<body>
    <?php include("includes/layouts/header.php");
    if (!isset($_SESSION["username"])) {
        echo "<script>location.href = 'index.php'</script>";
    }
    ?>
    <main role="main" class="admin">
        <div class="pagination">
            <div class="pag-wrap">
                <div class="item">
                    <a class="link" href="editor.php">Home</span>
                    <span class="separator">></span>
                    <span class="current">Dashboard</span>
                </div>
            </div>
            <hr>
        </div>
        <div class="panel">
            <div class="section-heading">
                <h1 class="heading">
                    Welcome,
                    <span>
                        <?php echo $_SESSION["username"]; ?>
                    </span>
                </h1>
            </div>
            
            <div class="users-grid">
                <div class="table">
                    <div class='row'>
                        <div class='cell'>Username</div>
                        <div class='cell'>Password</div>
                        <div class='cell'>Total Downloads</div>
                    </div>
                    <?php include "includes/db.php";
                    $result = $con->query("SELECT * FROM users");
                    $f = 0b00;
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='row'>";
                        echo "<div class='cell'>" . $row["username"] . "</div>";
                        echo "<div class='cell'>" . $row["password"] . "</div>";
                        echo "<div class='cell'>" . $row["count"] . "</div>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <?php include("includes/layouts/footer.php"); ?>
</body>

</html>