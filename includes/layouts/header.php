<header>
    <nav class="navbar">
        <a class="brand" href="editor.php"><img src="assets/images/logo-wr.png" alt=""></a>
        <div class="nav-wrap">
            <div class="link">
                <?php
                error_reporting(0);
                if ($_SESSION["username"] == "admin") {
                    echo "<a class='nav-link' href='admin.php'>Dashboard</a>";
                } else {
                    echo "<a class='nav-link' href='#'>" . $_SESSION["username"] . "</a>";
                } ?>
            </div>
            <a class='btn btn-danger my-2 my-sm-0' href='logout.php'>Logout</a>
        </div>
    </nav>
</header>