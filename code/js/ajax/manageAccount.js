//获取用户列表
$.post("../../../php/getUser1List.php", "", function (data) {
    result = $.parseJSON(data);
    str = "";
    $.each(result, function (index, item) {
        if (item.image == null) item.image = "";
        if (item.is_vip == null) item.is_vip = "";
        if (item.is_vip == 1) item.is_vip = "VIP会员";
        else item.is_vip = "普通用户";
        if (item.status == 1) {
            item.status = "正常";
            if (item.is_vip == "VIP会员")
                str += "<tr class='success'>";
            else
                str += "<tr>";
            str += "<td>" + "<img src='" + item.image + "' width='50' height='50' alt=''>" + "</td>"
            str += "<td>" + item.account + "</td>";
            str += "<td>" + item.user_name + "</td>";
            str += "<td>" + item.gender + "</td>";
            str += "<td>" + item.is_vip + "</td>";
            str += "<td>" + item.status + "</td>";
            str += "<td>" + "<a class='btn btn-info' href='../../../php/resetPassword.php?userId=" + item.user_id + "'onclick='return myConfirm(\"确定要重置该用户密码吗？\");'>" + "重置密码" + "</a>";
            str += "&nbsp" + "<a class='btn btn-danger' href='../../../php/banAccount.php?userId=" + item.user_id + "'onclick='return myConfirm(\"确定要禁用该用户\");'>" + "禁用" + "</a>";
            str += "</td>";
            str += "</tr>";
        } else {
            item.status = "禁用中";
            str += "<tr class='danger'>";
            str += "<td>" + "<img src='" + item.image + "' width='50' height='50' alt=''>" + "</td>"
            str += "<td>" + item.account + "</td>";
            str += "<td>" + item.user_name + "</td>";
            str += "<td>" + item.gender + "</td>";
            str += "<td>" + item.is_vip + "</td>";
            str += "<td>" + item.status + "</td>";
            str += "<td>" + "<a class='btn btn-info' href='../../../php/resetPassword.php?userId=" + item.user_id + "'onclick='return myConfirm(\"确定要重置该用户密码吗？\");'>" + "重置密码" + "</a>";
            str += "&nbsp" + "<a class='btn btn-warning' href='../../../php/banAccount.php?userId=" + item.user_id + "'onclick='return myConfirm(\"确定要解禁该用户吗？\");'>" + "解禁" + "</a>";
            str += "</td>";
            str += "</tr>";
        }
    });
    $("#list").html(str);
    $("#tableList").trigger("update");
});
$(function () {
    $("#tableList").tablesorter();
});

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
            name: '性别:',
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
            name: '0:',
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
function myConfirm(message)
{
    if(confirm(message))
        return true;
    else
        return false;
}