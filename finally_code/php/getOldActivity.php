<?php
include('conn.php');

$sql="select * from activity order by status asc,sign_up asc";

$rs=mysqli_query($conn,$sql);
$arrs=[];
while($row=mysqli_fetch_assoc($rs)){
    array_push($arrs,$row);
}
echo json_encode($arrs);
?>