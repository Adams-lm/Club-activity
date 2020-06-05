$.post("../../../php/getActJoinList.php", "", function (data) {
  result = $.parseJSON(data);
  str = "";
  if (data != "[]") {//如果数据不为空
    $.each(result, function (index, item) {

      if (item.is_vip == "VIP会员")
        str += "<tr class='success'>";
      else
        str += "<tr>";

      str += "<td>" + item.user_name + "</td>";
      str += "<td>" + item.account + "</td>";
      str += "<td>" + item.act_name + "</td>";
      if (item.service_name == null)
        item.service_name = "无";
      str += "<td>" + item.service_name + "</td>";
      str += "<td>" + item.is_vip + "</td>";
      str += "<td>" + "<a class='btn btn-success' href='../../../php/approveActJoin.php?id=" + item.id + "'>" + "通过" + "</a>";
      str += "&nbsp" + "<a class='btn btn-danger' href='../../../php/refuseActJoin.php?id=" + item.id + "' onclick='return myConfirm(\"确定要拒绝该用户的申请吗？\");' >" + "拒绝" + "</a>";
      str += "</td>";
      str += "</tr>";
    });
  } else {//否则显示没有需要审批
    str = "<td colspan='6'><div class=' alert-success center' >没有需要审批的报名申请 </td></div>"
    $("#approve").hide();
    $("#tip").hide();
  }
  $("#list").html(str);
  $("#tableList").trigger("update");
});
$(function () {
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