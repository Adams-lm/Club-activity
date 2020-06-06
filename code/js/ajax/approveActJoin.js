var pageIndex = 1;    //页面索引初始值   
var pageSize = 5;     //每页显示条数初始化，修改显示条数，修改这里即可   
var pageCount = 30;   //总的记录数，随便赋个初值好了，后面会重新赋值的 
$(document).ready(function () {
  // 得到要显示的总的记录数
  $.ajax({
    url: '../../../php/pageApproActJoin.php',
    async: false,  // 取消异步，因为只有先得到总记录数，才能计算实际需要多少页
    type: 'POST',
    dataType: 'json',
    data: { index: '0', size: pageSize }, // 提交数据
    success: function (data) {
      pageCount = data.total;
    },
    error: function () {
      alert("error");
    }
  });

  InitTable(pageIndex);    //初始化表格数据
  InitPager();
});

function InitPager() {
  //分页，PageCount是总条目数，这是必选参数，其它参数都是可选
  $("#pager").pagination(pageCount, {
    callback: pageCallback,  //PageCallback() 为翻页调用次函数。
    prev_text: "上一页",
    next_text: "下一页",
    items_per_page: pageSize,
    num_edge_entries: 2,       //两侧首尾分页条目数
    num_display_entries: 3,    //连续分页主体部分分页条目数
    current_page: pageIndex - 1,   //当前页索引
    link_to: "javascript:void(0);"
  });
}
//翻页调用   
function pageCallback(index, jq) {
  InitTable(index + 1);
}
//请求数据   
function InitTable(pageIndex) {
  $.ajax({
    type: "POST",
    url: "../../../php/pageApproActJoin.php",
    dataType: "json",
    //提交两个参数：pageIndex(页面索引)，pageSize(显示条数)
    data: { index: pageIndex, size: pageSize },
    success: function (data) {
      var str = "";

      if (data != "[]") {//如果数据不为空
        $.each(data, function () {

          if (this['is_vip'] == "VIP会员")
            str += "<tr class='success'>";
          else
            str += "<tr>";

          str += "<td>" + this['user_name'] + "</td>";
          str += "<td>" + this['account'] + "</td>";
          str += "<td>" + this['act_name'] + "</td>";
          if (this['service_name'] == null)
            this['service_name'] = "无";
          str += "<td>" + this['service_name'] + "</td>";
          str += "<td>" + this['is_vip'] + "</td>";
          str += "<td>" + "<a class='btn btn-success' href='../../../php/approveActJoin.php?id=" + this['id'] + "'>" + "通过" + "</a>";
          str += "&nbsp" + "<a class='btn btn-danger' href='../../../php/refuseActJoin.php?id=" + this['id'] + "' onclick='return myConfirm(\"确定要拒绝该用户的申请吗？\");' >" + "拒绝" + "</a>";
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
    },
    error: function () {
      alert("error");
    }
  });
  //触发tablesort
  $(function () {
    $("#tableList").tablesorter();
  });
}

//自定义提示函数
function myConfirm(message) {
  if (confirm(message))
    return true;
  else
    return false;
}