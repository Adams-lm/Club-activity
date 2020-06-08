<?php
include('conn.php');

$sql="select *, (NOW()-start_time)/(end_time-start_time)*100 as percent,end_time<NOW() as end,start_time<NOW() as ready from activity order by status desc,end asc,start_time asc";

$rs=mysqli_query($conn,$sql);
$arrs=[];
while($row=mysqli_fetch_assoc($rs)){
    array_push($arrs,$row);
}
echo json_encode($arrs);
?>