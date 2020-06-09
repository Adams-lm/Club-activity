<?php
include('conn.php');

$sql="select act_id,act_name,content,status,sign_up,image from activity order by status desc,sign_up desc";

$rs=mysqli_query($conn,$sql);
$arrs=[];
while($row=mysqli_fetch_assoc($rs)){
    array_push($arrs,$row);
}
echo json_encode($arrs);
?>