<?php
include("conn.php");
$status=1;
$sql="select gender as name,count(*) as value from user where status=? group by gender";
$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,"i",$status);
mysqli_stmt_execute($stmt);
$rs=mysqli_stmt_get_result($stmt);

$arrs=[];
while($row=mysqli_fetch_assoc($rs)){
    array_push($arrs,$row);
}
echo json_encode($arrs);
?>