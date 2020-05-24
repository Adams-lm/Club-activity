<?php
include('conn.php');
$del=0;
$sql="select id,user_name,user_pwd from users where is_del=?";

$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,"i",$del);
mysqli_stmt_execute($stmt);
$rs=mysqli_stmt_get_result($stmt);

$arrs=[];
while($row=mysqli_fetch_assoc($rs)){
    array_push($arrs,$row);
}
echo json_encode($arrs);
?>