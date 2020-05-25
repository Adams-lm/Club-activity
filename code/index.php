<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>home</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
    <table>
        <thead> 
            <tr>
                <td class='tittle'>用户名</td>
                <td class='tittle'>密码</td>
                <td colspan='2' class='tittle'>操作</td>
            </tr>
            <tr>
                <td colspan='3'><div id='chart' style="cursor:pointer">各部门人数统计</div></td>
            </tr>
        </thead>
        <tbody id="list">
        </tbody>
    </table>

    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $('#chart').click(function(e){
            window.location='html/chart.html';
        });
        $.post("php/getList.php","",function(data){
            // console.log(data);
            result=$.parseJSON(data);
            str="";
            $.each(result,function(index,item){
                str+="<tr>";
                str+="<td>"+ item.user_name +"</td>";
                str+="<td>"+ item.user_pwd +"</td>";
                str+="<td><a href='php/del.php?id="+ item.id +"'>删除</a></td>";
                str+="<td><a href='php/modify.php?id="+ item.id +"'>修改</a></td>";
                str+="</tr>";
            });
            $("#list").html(str);
        });
    </script>
    
</body>
</html>