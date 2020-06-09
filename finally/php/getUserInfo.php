<?php
header("Content-type:text/html;charset=utf-8");
session_start();
include("functions.php");
include("conn.php");

$sql="SELECT * FROM user WHERE user_id=?";
$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,"i",$_SESSION["userId"]);
mysqli_stmt_execute($stmt);
$rs=mysqli_stmt_get_result($stmt);
$arrs=[];
if($row=mysqli_fetch_assoc($rs)){
    array_push($arrs,$row);
}
echo json_encode($arrs);
// showAlert($s);
?>