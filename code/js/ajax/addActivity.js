var pageIndex = 1;    //页面索引初始值   
var pageSize = 5;     //每页显示条数初始化，修改显示条数，修改这里即可   
var pageCount = 30;   //总的记录数，随便赋个初值好了，后面会重新赋值的 
$(document).ready(function () {
    // 得到要显示的总的记录数
    $.ajax({
        url: '../../../php/pageAddAct.php',
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
        url: "../../../php/pageAddAct.php",
        dataType: "json",
        //提交两个参数：pageIndex(页面索引)，pageSize(显示条数)
        data: { index: pageIndex, size: pageSize },
        success: function (data) {
            var str = "";
            $.each(data, function () {
                //在线
                if (this['status'] == 1) {
                    //已结束
                    if (this['end'] == 1) {
                        this['status'] = "已结束";
                        str += "<tr>";
                    } else {
                        //进行中
                        //已开始
                        if (this['ready'] == 1) {
                            this['status'] = "进行中";
                            str += "<tr class='success'>";
                        } else {
                            this['status'] = "未开始";
                            str += "<tr class='warning'>";
                        }
                    }
                } else {
                    //下线
                    this['status'] = "已下线";
                    str += "<tr class='danger'>";
                }
                //内容
                str += "<td>" + this['act_name'] + "</td>";
                str += "<td>" + this['start_time'] + "</td>";
                str += "<td>" + this['end_time'] + "</td>";
                str += "<td>" + this['status'] + "</td>";
                str += "</tr>";
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