//ajax+分页动态获取获取用户列表
var pageIndex = 1;    //页面索引初始值   
var pageSize = 5;     //每页显示条数初始化，修改显示条数，修改这里即可   
var pageCount = 30;   //总的记录数，随便赋个初值好了，后面会重新赋值的 
$(document).ready(function () {
    // 得到要显示的总的记录数
    $.ajax({
        url: '../../../php/pageManageAccount.php',
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
        url: "../../../php/pageManageAccount.php",
        dataType: "json",
        //提交两个参数：pageIndex(页面索引)，pageSize(显示条数)
        data: { index: pageIndex, size: pageSize },
        success: function (data) {
            var str = "";
            $.each(data, function () {

                if (this['image'] == null) this['image'] = "";
                if (this['is_vip'] == 1) this['is_vip'] = "VIP会员";
                else this['is_vip'] = "普通用户";
                if (this['status'] == 1) {//正常状态下的用户
                    this['status'] = "正常";
                    if (this['is_vip'] == "VIP会员")
                        str += "<tr class='success'>";//会员绿色标识
                    else
                        str += "<tr>";
                    str += "<td>" + "<img src='" + this['image'] + "' width='50' height='50' alt=''>" + "</td>"
                    str += "<td>" + this['account'] + "</td>";
                    str += "<td>" + this['user_name'] + "</td>";
                    str += "<td>" + this['gender'] + "</td>";
                    str += "<td>" + this['is_vip'] + "</td>";
                    str += "<td>" + this['status'] + "</td>";
                    str += "<td>" + "<a class='btn btn-info' href='../../../php/resetPassword.php?userId=" + this['user_id'] + "'onclick='return myConfirm(\"确定要重置该用户密码吗？\");'>" + "重置密码" + "</a>";
                    str += "&nbsp" + "<a class='btn btn-danger' href='../../../php/banAccount.php?userId=" + this['user_id'] + "'onclick='return myConfirm(\"确定要禁用该用户\");'>" + "禁用" + "</a>";
                    str += "</td>";
                    str += "</tr>";
                } else {//禁用中红色标识
                    this['status'] = "禁用中";
                    str += "<tr class='danger'>";
                    str += "<td>" + "<img src='" + this['image'] + "' width='50' height='50' alt=''>" + "</td>"
                    str += "<td>" + this['account'] + "</td>";
                    str += "<td>" + this['user_name'] + "</td>";
                    str += "<td>" + this['gender'] + "</td>";
                    str += "<td>" + this['is_vip'] + "</td>";
                    str += "<td>" + this['status'] + "</td>";
                    str += "<td>" + "<a class='btn btn-info' href='../../../php/resetPassword.php?userId=" + this['user_id'] + "'onclick='return myConfirm(\"确定要重置该用户密码吗？\");'>" + "重置密码" + "</a>";
                    str += "&nbsp" + "<a class='btn btn-warning' href='../../../php/banAccount.php?userId=" + this['user_id'] + "'onclick='return myConfirm(\"确定要解禁该用户吗？\");'>" + "解禁" + "</a>";
                    str += "</td>";
                    str += "</tr>";
                }
            });
            $("#list").html(str);//写入页面
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

//性别图表
$.get("../../../php/getGenderNum.php", "", function (data) {
    data = $.parseJSON(data);

    // 指定图表的配置项和数据
    option = {
        title: {
            padding: 100,
            text: '社团成员性别统计表',
            left: 'center'
        },
        tooltip: {
            trigger: 'item',
            formatter: '{a}{b} : {c} ({d}%)'
        },
        legend: {
            orient: 'horizontal',
            left: 'center',
            top: 'bottom',
            formatter: '{name}',
            data: data.name
        },
        series: [{
            name: '',
            type: 'pie',
            radius: '55%',
            center: ['50%', '60%'],
            data: data,
            emphasis: {
                itemStyle: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }]
    };

    var myChart = echarts.init(document.getElementById('chartGender'), 'walden');
    myChart.setOption(option);
});

//VIP图表
$.get("../../../php/getVipNum.php", "", function (data) {
    data = $.parseJSON(data);
    var myChart = echarts.init(document.getElementById('chartVIP'), 'walden');

    option = {
        title: {
            padding: 100,
            text: '社团成员VIP会员统计表',
            left: 'center'
        },
        tooltip: {
            trigger: 'item',
            formatter: '{a}{b} : {c} ({d}%)'
        },
        legend: {
            orient: 'horizontal',
            left: 'center',
            top: 'bottom',
            formatter: {
                name
            },
            data: data.name
        },
        series: [{
            name: '',
            type: 'pie',
            radius: '55%',
            center: ['50%', '60%'],
            data: data,
            emphasis: {
                itemStyle: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }]
    };

    myChart.setOption(option);
});

//控制显示
$("#clickButton").click(function () {
    // $("#toggle").toggle();//显示时点击为隐藏，隐藏时点击为显示
    if ($("#toggle").css("visibility") != "hidden") {
        $("#toggle").css("visibility", "hidden");
    } else {
        $("#toggle").css("visibility", "visible");
    };
});

//自定义提示函数
function myConfirm(message) {
    if (confirm(message))
        return true;
    else
        return false;
}