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
        str += "&nbsp" + "<a class='btn btn-danger' href='../../../php/deleteAccount.php?userId=" + item.user_id + "'onclick='return myConfirm(\"确定要拒绝该用户的申请吗？\");'>" + "拒绝" + "</a>";
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

//自定义提示函数
function myConfirm(message)
{
    if(confirm(message))
        return true;
    else
        return false;
}