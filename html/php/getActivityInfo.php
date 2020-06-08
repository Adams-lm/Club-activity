<?php
include('conn.php');
include('functions.php');
$id=$_GET["act_id"];
$sql="select * from activity where act_id=?";
$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,"i",$id);
mysqli_stmt_execute($stmt);
$rs=mysqli_stmt_get_result($stmt);

$arrs=[];
while($row=mysqli_fetch_assoc($rs)){
    array_push($arrs,$row);
}

echo json_encode($arrs);

?>