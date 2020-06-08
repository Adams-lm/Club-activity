//ajax获取服务包列表
var actId = document.getElementById("hidden").value;
$.post("../../../php/getServiceList1.php?", {
  actId: actId
}, function (data) {
  result = $.parseJSON(data);
  str = "";
  if (data != "[]") {//若不为空
    $.each(result, function (index, item) {
      var status = "";
      if (item.is_ban == "0") {//正常状态服务包
        status = "正常";
        str += "<tr>";
        str += "<td>" + item.service_name + "</td>";
        str += "<td>" + item.price + "</td>";
        str += "<td>" + item.content + "</td>";
        str += "<td>" + status + "</td>";
        str += "<td>" + "<a class='btn btn-warning' href='../../../php/banService.php?serviceId=" + item.service_id + "'onclick= 'return myConfirm(\"确定要禁用该服务包吗？\");'>" + "禁用" + "</a>";
        str += "&nbsp" + "<a class='btn btn-danger' href='../../../php/deleteService.php?serviceId=" + item.service_id + "' onclick= 'return myConfirm(\"确定要删除该服务包吗？\");' >" + "删除" + "</a>";
        str += "</td>";
      } else {//禁用状态服务包
        status = "禁用中";
        str += "<tr class='danger'>";
        str += "<td>" + item.service_name + "</td>";
        str += "<td>" + item.price + "</td>";
        str += "<td>" + item.content + "</td>";
        str += "<td>" + status + "</td>";
        str += "<td>" + "<a class='btn btn-success' href='../../../php/banService.php?serviceId=" + item.service_id + " 'onclick= 'return myConfirm(\"确定要解禁该服务包吗？\");'>" + "解禁" + "</a>";
        str += "&nbsp" + "<a class='btn btn-danger' href='../../../php/deleteService.php?serviceId=" + item.service_id + " 'onclick= 'return myConfirm(\"确定要删除该服务包吗？\");' >" + "删除" + "</a>";
        str += "</td>";
      }
    });
  }
  else {//若无服务包
    str = "<td colspan='5'><div class=' alert-warning center' >还没有添加服务包呢！ </td></div>"
  }
  $("#list").html(str);
  $("#tableList").trigger("update");
});
$(function () {
  $("#tableList").tablesorter();
});

//自定义提示函数
function myConfirm(message) {
  if (confirm(message))
    return true;
  else
    return false;
}