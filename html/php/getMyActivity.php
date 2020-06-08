<?php

include('conn.php');
session_start();
$userId=$_SESSION["userId"];
$sql="select a.act_id,a.user_id,a.status as pass,a.is_sign,b.act_name,b.content,b.image,b.status as online from activity_join a join activity b on a.act_id=b.act_id where user_id = ? order 
  by b.status desc,a.is_sign asc,a.status asc";

$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,"i",$userId);
mysqli_stmt_execute($stmt);
$rs=mysqli_stmt_get_result($stmt);
$arrs=[];
while($row=mysqli_fetch_assoc($rs)){
    array_push($arrs,$row);
}
echo json_encode($arrs);
?>