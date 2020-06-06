<?php 
	if(isset($_POST["index"])){
  		$pageIndex = $_POST["index"];
	}
	if(isset($_POST["size"])){
  		$pageSize = $_POST["size"];
	}

	include "conn.php";
	//防止乱码
	mysqli_query($conn,"set character set 'utf8'");
	mysqli_query($conn,"set names 'utf8'");
	
	// 首次查询，只需要得到记录数量即可
	if($pageIndex==0){
		$query = "select count(*) from activity_join where status = 0 ";
		// 连接数据库
		// 执行查询操作
		$result = $conn->query($query);

		echo json_encode(array("total"=>mysqli_fetch_array($result)['0']));
	}
	else{
		// 设置偏移记录数，即设置开始行号
		$startRowNum = ($pageIndex-1) * $pageSize;  
		$numOfRows = $pageSize;  // 返回的最多行数
		$query = "select a.id,act_name,account,user_name,service_name,a.user_id,IF(end_time>NOW(),'VIP会员','普通用户')as is_vip from 
        ( select activity_join.id,act_name,`user`.user_id,account,user_name from  activity_join LEFT JOIN `user` ON activity_join.user_id=`user`.user_id LEFT JOIN activity ON activity_join.act_id=activity.act_id WHERE activity_join.`status`=0) as a 
        LEFT JOIN service_buy NATURAL JOIN service
        ON  a.user_id = service_buy.user_id LEFT JOIN vip_buy on a.user_id=vip_buy.user_id order by is_vip limit 
        ".$startRowNum.",". $numOfRows;
		
		$result = $conn->query($query);

		$arr = array();
		while($row = mysqli_fetch_array($result)){
	        array_push($arr, $row);
		}
		echo json_encode($arr);
	}
	
 ?>
