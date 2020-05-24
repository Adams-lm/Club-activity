<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>home</title>
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
    <table>
        <thead>
            <tr>
                <td class='tittle'>用户名</td>
                <td class='tittle'>密码</td>
                <td colspan='2' class='tittle'>操作</td>
            </tr>
        </thead>
        <tbody id="list">
        </tbody>
    </table>
    <p id="pages">
    </p>
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        const PAGE_SIZE=3;
        var iCount=0;
        var curPage=1;
        var iSum=0;
        var originData="";
        var str="";

        $.post("getList.php","",function(data){
            str="";
            iCount=(curPage-1)*PAGE_SIZE;
            // console.log(data);
            result=$.parseJSON(data);
            originData=result;

            $.each(result,function(i,item){
                if(iCount < curPage*PAGE_SIZE){
                    str+="<tr>";
                    str+="<td>"+ item.user_name +"</td>";
                    str+="<td>"+ item.user_pwd +"</td>";
                    str+="<td><a href='php/del.php?id="+ item.id +"'>删除</a></td>";
                    str+="<td><a href='php/modify.php?id="+ item.id +"'>修改</a></td>";
                    str+="</tr>";
                    iCount++;
                }
                iSum++;
            });
            $("#list").html(str);
            str="";
            pages= Math.ceil(iSum / PAGE_SIZE);
            for(i=1;i<=pages;i++){
                str+="<a href='#' data-id="+i+" class='page_link'>"+i+"</a>";
            }
            $("#pages").html(str);
        });
        $(document).on("click","a.page_link",function(e){
            curPage=$(this).attr("data-id");
            iCount=(curPage-1)*PAGE_SIZE;
            str="";

            $.each(originData,function(i,item){
                if(i==iCount && iCount<curPage*PAGE_SIZE){
                    str+="<tr>";
                    str+="<td>"+ item.user_name +"</td>";
                    str+="<td>"+ item.user_pwd +"</td>";
                    str+="<td><a href='php/del.php?id="+ item.id +"'>删除</a></td>";
                    str+="<td><a href='php/modify.php?id="+ item.id +"'>修改</a></td>";
                    str+="</tr>";
                    iCount++;
                }
            });
            $("#list").html(str);
            return false;
        });
    </script>
    
</body>
</html>