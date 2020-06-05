var actId = document.getElementById("hidden").value;
    $.post("../../../php/getServiceList.php?", {
      actId: actId
    }, function(data) {
      result = $.parseJSON(data);
      str = "";
      $.each(result, function(index, item) {
        var status = "";
        if (item.is_ban == "0") {
          status = "正常";
          str += "<tr>";
          str += "<td>" + item.service_name + "</td>";
          str += "<td>" + item.price + "</td>";
          str += "<td>" + item.content + "</td>";
          str += "<td>" + status + "</td>";
          str += "<td>" + "<a class='btn btn-warning' href='../../../php/banService.php?serviceId=" + item.service_id + "'>" + "禁用" + "</a>";
          str += "&nbsp" + "<a class='btn btn-danger' href='../../../php/deleteService.php?serviceId=" + item.service_id + "'>" + "删除" + "</a>";
          str += "</td>";
        } else {
          status = "禁用中";
          str += "<tr class='danger'>";
          str += "<td>" + item.service_name + "</td>";
          str += "<td>" + item.price + "</td>";
          str += "<td>" + item.content + "</td>";
          str += "<td>" + status + "</td>";
          str += "<td>" + "<a class='btn btn-success' href='../../../php/banService.php?serviceId=" + item.service_id + "'>" + "解禁" + "</a>";
          str += "&nbsp" + "<a class='btn btn-danger' href='../../../php/deleteService.php?serviceId=" + item.service_id + "'>" + "删除" + "</a>";
          str += "</td>";
        }
      });
      $("#list").html(str);
      $("#tableList").trigger("update");
    });
    $(function() {
      $("#tableList").tablesorter();
    });