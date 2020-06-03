<?php
ini_set('date.timezone','Asia/Shanghai');
session_start();
$bool = ($_FILES["file"]["type"] == "image/gif"     ||
    $_FILES["file"]["type"] == "image/jfif"   ||
    $_FILES["file"]["type"] == "image/jpeg"    ||
    $_FILES["file"]["type"] == "image/png");
if (!$bool) {
    die("类型不对<a href='javascript:window.history.back();'>返回</a>");
}
$bool = $_FILES["file"]["size"] < 100000;
if (!$bool) {
    die("大小不对<a href='javascript:window.history.back();'>返回</a>");
}
if ($_FILES["file"]["error"] > 0) {
    die("Return Code:" . $_FILES["file"]["error"] . "<br/>");
}
$today = date("YmdHis");
$fileArray = explode(".", $_FILES["file"]["name"]);
$fileName = $today . "." . $fileArray[1];
move_uploaded_file($_FILES["file"]["tmp_name"], "../../../upload/$fileName");
$filePath = "../../../upload/$fileName";
$_SESSION["image"] = $filePath;
echo "<script>";
echo "alert('上传成功！');";
echo "window.parent.document.getElementById('image').src='" . $_SESSION['image'] . "';";
echo "window.location='upload.php';";
echo "</script>";
?>