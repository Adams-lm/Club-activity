<?php
include('conn.php');

//申请中的在上，禁用的在下
$sql="select * from user where status != 1 order by status desc";

$rs=mysqli_query($conn,$sql);
$arrs=[];
while($row=mysqli_fetch_assoc($rs)){
    array_push($arrs,$row);
}
echo json_encode($arrs);
?>