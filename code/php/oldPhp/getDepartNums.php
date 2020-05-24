<?php
include("conn.php");
$del=0;
$sql="select depart_id as name,count(*) as value from users where is_del=? group by depart_id";
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