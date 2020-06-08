<?php
include('functions.php');
include('conn.php');
$actId=$_GET["actId"];
$sql="select * from service where act_id=? and is_ban=0 order by price asc";

$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,"i",$actId);
mysqli_stmt_execute($stmt);
$rs=mysqli_stmt_get_result($stmt);
$arrs=[];
while($row=mysqli_fetch_assoc($rs)){
    array_push($arrs,$row);
}
if(!$arrs){
    //没有服务包
    echo 0;
}else{
    echo json_encode($arrs);
}

?>