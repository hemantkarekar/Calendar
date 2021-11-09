<?php
session_start();
require "includes/fpdf181/fpdf.php";
include "includes/db.php";


$pdf = new FPDF('L', 'mm', array(216, 140));
$pdf->AliasNbPages();
$pdf->SetMargins(0, 0);
$pdf->SetAutoPageBreak(false);

$pdf->AddPage();
$pdf->Image("cache/" . $_SESSION["username"] . "/month0.png", 0, 0, 216, 140);

$pdf->AddPage();
$pdf->Image("cache/" . $_SESSION["username"] . "/month1.png", 0, 0, 216, 140);
$pdf->AddPage();
$pdf->Image("assets/images/templates/template " . $_POST["templateradio"] . "/month1_back.png", 0, 0, 216, 140);

$pdf->AddPage();
$pdf->Image("cache/" . $_SESSION["username"] . "/month2.png", 0, 0, 216, 140);
$pdf->AddPage();
$pdf->Image("assets/images/templates/template " . $_POST["templateradio"] . "/month2_back.png", 0, 0, 216, 140);

$pdf->AddPage();
$pdf->Image("cache/" . $_SESSION["username"] . "/month3.png", 0, 0, 216, 140);
$pdf->AddPage();
$pdf->Image("assets/images/templates/template " . $_POST["templateradio"] . "/month3_back.png", 0, 0, 216, 140);

$pdf->AddPage();
$pdf->Image("cache/" . $_SESSION["username"] . "/month4.png", 0, 0, 216, 140);
$pdf->AddPage();
$pdf->Image("assets/images/templates/template " . $_POST["templateradio"] . "/month4_back.png", 0, 0, 216, 140);

$pdf->AddPage();
$pdf->Image("cache/" . $_SESSION["username"] . "/month5.png", 0, 0, 216, 140);
$pdf->AddPage();
$pdf->Image("assets/images/templates/template " . $_POST["templateradio"] . "/month5_back.png", 0, 0, 216, 140);

$pdf->AddPage();
$pdf->Image("cache/" . $_SESSION["username"] . "/month6.png", 0, 0, 216, 140);
$pdf->AddPage();
$pdf->Image("assets/images/templates/template " . $_POST["templateradio"] . "/month6_back.png", 0, 0, 216, 140);

$pdf->AddPage();
$pdf->Image("cache/" . $_SESSION["username"] . "/month7.png", 0, 0, 216, 140);
$pdf->AddPage();
$pdf->Image("assets/images/templates/template " . $_POST["templateradio"] . "/month7_back.png", 0, 0, 216, 140);

$pdf->AddPage();
$pdf->Image("cache/" . $_SESSION["username"] . "/month8.png", 0, 0, 216, 140);
$pdf->AddPage();
$pdf->Image("assets/images/templates/template " . $_POST["templateradio"] . "/month8_back.png", 0, 0, 216, 140);

$pdf->AddPage();
$pdf->Image("cache/" . $_SESSION["username"] . "/month9.png", 0, 0, 216, 140);
$pdf->AddPage();
$pdf->Image("assets/images/templates/template " . $_POST["templateradio"] . "/month9_back.png", 0, 0, 216, 140);

$pdf->AddPage();
$pdf->Image("cache/" . $_SESSION["username"] . "/month10.png", 0, 0, 216, 140);
$pdf->AddPage();
$pdf->Image("assets/images/templates/template " . $_POST["templateradio"] . "/month10_back.png", 0, 0, 216, 140);

$pdf->AddPage();
$pdf->Image("cache/" . $_SESSION["username"] . "/month11.png", 0, 0, 216, 140);
$pdf->AddPage();
$pdf->Image("assets/images/templates/template " . $_POST["templateradio"] . "/month11_back.png", 0, 0, 216, 140);

$pdf->AddPage();
$pdf->Image("cache/" . $_SESSION["username"] . "/month12.png", 0, 0, 216, 140);
$pdf->AddPage();
$pdf->Image("assets/images/templates/template " . $_POST["templateradio"] . "/month12_back.png", 0, 0, 216, 140);

$pdf->AddPage();
$pdf->Image("assets/images/templates/template " . $_POST["templateradio"] . "/back.png", 0, 0, 216, 140);

ob_clean();

$pdf->Output("D", "Calender 2021.pdf");

/* DATABASE UPDATES */
$result = $con->query("SELECT * FROM users");
$count = 0;
while ($row = $result->fetch_assoc()) {
      if ($row['username'] == $_SESSION["username"]) {
            $count = $row['count'];
      }
}
$count = $count + 1;
$query = $con->query("UPDATE users SET `count` ='$count' WHERE `username` ='$_SESSION[username]'");
