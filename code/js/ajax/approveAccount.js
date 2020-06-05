$.post("../../../php/getUser0List.php", "", function(data) {
    result = $.parseJSON(data);
    str = "";
    if (data != "[]") {//若不为空
      $.each(result, function(index, item) {
        str += "<tr>";
        str += "<td>" + "<img src='" + item.image + "' width='50' height='50' alt=''>" + "</td>"
        str += "<td>" + item.account + "</td>";
        str += "<td>" + item.user_name + "</td>";
        str += "<td>" + item.gender + "</td>";
        str += "<td>" + "<a class='btn btn-success' href='../../../php/approveAccount.php?userId=" + item.user_id + "'>" + "通过" + "</a>";
        str += "&nbsp" + "<a class='btn btn-danger' href='../../../php/deleteAccount.php?userId=" + item.user_id + "' onclick= 'return del();'>" + "拒绝" + "</a>";
        str += "</td>";
        str += "</tr>";
      });
    } else {//若为空 提示
      str = "<td colspan='5'><div class=' alert-success center' >没有需要审批的用户 </td></div>"
      $("#approve").hide();
    }
    $("#list").html(str);
    $("#tableList").trigger("update");
  });
  $(function() {
    $("#tableList").tablesorter();
  });

//自定义一键通过提示函数
function approve()
{
    if(confirm("确定要全部通过吗？"))
        return true;
    else
        return false;
}

//自定义删除提示函数
function del()
{
    if(confirm("确定要拒绝吗？"))
        return true;
    else
        return false;
}