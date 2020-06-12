<?php
//针对某个活动的报名情况，需要get传参
include('conn.php');
$serviceId=$_GET["serviceId"];
$sql="select * from service_buy natural join service natural join user where service_id = ?";

$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,"i",$serviceId);
mysqli_stmt_execute($stmt);
$rs=mysqli_stmt_get_result($stmt);
$arrs=[];
while($row=mysqli_fetch_assoc($rs)){
    array_push($arrs,$row);
}
echo json_encode($arrs);
?>