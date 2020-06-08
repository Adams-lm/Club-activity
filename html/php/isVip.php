<?php
include('conn.php');
include('functions.php');
$id=$_REQUEST["user_id"];
$sql="select * from vip_buy where user_id=?";
$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,"i",$id);
mysqli_stmt_execute($stmt);
$rs=mysqli_stmt_get_result($stmt);

$arrs=[];
if($row=mysqli_fetch_assoc($rs)){
    //1代表是会员
    echo 1;
}else{
    echo 0;
}



?>