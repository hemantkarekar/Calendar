<?php
session_start();
// requires php5  
$dir = $_SESSION["username"];
$path = getcwd() . "/cache/" . $dir;
function rrmdir($dir)
{
      if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                  if ($object != "." && $object != "..") {
                        if (filetype($dir . "/" . $object) == "dir")
                              rrmdir($dir . "/" . $object);
                        else unlink($dir . "/" . $object);
                  }
            }
            reset($objects);
            rmdir($dir);
      }
}
if (!is_dir($path)) {
    if (mkdir($path, 0777)) {
          //echo "Success";
    }
}
define('UPLOAD_DIR', $path."/");
$img = $_POST['imgBase64'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = UPLOAD_DIR . $_POST["month"] . ".png";
$success = file_put_contents($file, $data);

$_SESSION["template"] = $_POST["template"];




