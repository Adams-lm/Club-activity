<?php
session_start();
header("Content-type:text/html;charset=utf-8");
include("functions.php");
include("conn.php");
$sql="SELECT balance FROM user WHERE user_id=?";
$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,"i",$_SESSION["userId"]);
mysqli_stmt_execute($stmt);
$rs=mysqli_stmt_get_result($stmt);

if($row=mysqli_fetch_array($rs)){
  echo $row[0];
}
?>