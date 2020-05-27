<?php
//针对某个活动的服务包，需要get传参
include('conn.php');
$actId=$_GET["actId"];
$sql="select * from service where act_id = ?";

$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,"i",$actId);
mysqli_stmt_execute($stmt);
$rs=mysqli_stmt_get_result($stmt);
$arrs=[];
while($row=mysqli_fetch_assoc($rs)){
    array_push($arrs,$row);
}
echo json_encode($arrs);
?>