$(document).ready(function(){
    $("#code").click(function () {
        $("#content_code").css("display","block");
        $("#content_html").css("display","none");
    });
    $("#bvideo").click(function () {
        var value = document.getElementById("video").style.display;
        if(value == "none"){
            $("#video").css("display","block");
        }else{
            $("#video").css("display","none");
             }
    });
    $("#insert_video").click(function () {
        var id = $("#videoID").val();
        var code = $("#content_code").val();
        code = code + "\n<YOUTUBE>" +id+ "</YOUTUBE>";
        $("#content_code").val(code);
        $("#content_html").css("display","none");
        $("#videoID").val("");
    });
    $("#Strong").click(function () {
        var text = $("#content_code")[0]
        var start = text.selectionStart;
        var end = text.selectionEnd;
        var value = $("#content_code").val();
        var newtext = value.substr(0,start) + "<Strong>" + value.substr(start,end - start) + "</Strong>" + value.substr(end);
        $("#content_code").val(newtext);
    });
    $("#em").click(function () {
        var text = $("#content_code")[0]
        var start = text.selectionStart;
        var end = text.selectionEnd;
        var value = $("#content_code").val();
        var newtext = value.substr(0,start) + "<em>" + value.substr(start,end - start) + "</em>" + value.substr(end);
        $("#content_code").val(newtext);
    });
    $("#R").click(function () {
        var text = $("#content_code")[0]
        var start = text.selectionStart;
        var end = text.selectionEnd;
        var value = $("#content_code").val();
        var newtext = value.substr(0,start) + "<R>" + value.substr(start,end - start) + "</R>" + value.substr(end);
        $("#content_code").val(newtext);
    });
    $("#B").click(function () {
        var text = $("#content_code")[0]
        var start = text.selectionStart;
        var end = text.selectionEnd;
        var value = $("#content_code").val();
        var newtext = value.substr(0,start) + "<B>" + value.substr(start,end - start) + "</B>" + value.substr(end);
        $("#content_code").val(newtext);
    });
    $("#G").click(function () {
        var text = $("#content_code")[0]
        var start = text.selectionStart;
        var end = text.selectionEnd;
        var value = $("#content_code").val();
        var newtext = value.substr(0,start) + "<G>" + value.substr(start,end - start) + "</G>" + value.substr(end);
        $("#content_code").val(newtext);
    });
    $("#html").click(function () {
        $("#content_code").css("display","none");
        $("#content_html").css("display","block");
        var value = change($("#content_code").val());
        function change (value)
        {
            value = value.replace(/<R>/g,"<span style=\"color:red;\">");
            value = value.replace(/<\/R>/g,"</span>");
            value = value.replace(/<B>/g,"<span style=\"color:blue;\">");
            value = value.replace(/<\/B>/g,"</span>");
            value = value.replace(/<G>/g,"<span style=\"color:green;\">");
            value = value.replace(/<\/G>/g,"</span>");
            value = value.replace(/<YOUTUBE>/g,"(No Preview for the Video)<br>(Video ID:");
            value = value.replace(/<\/YOUTUBE>/g,")");
            value = value.replace(/\n/g,"<br>");
            return value;
        }
        $("#content_html").html(value);
    });
    //JSON
    $("#create").click(function () {
        var form = $("#form_article").serializeArray();
        if($("#article_id").val() == "") {
            $.post("Article.php",form,function(result) {
                if (result == "success") {
                    alert("Posted Successful!");
                    window.location.href="index.php";
                    // $("#title").val("");
                        // $("#content_code").val("");
                        // $("#content_html").val("");
                        // $("#videoID").html("");
                        // $("#cancel").click();
                        // $.post("article_dis.php",{id:$("#uid").val()},function (result) {
                        //     var json = eval('(' + result + ')');
                        //     var html = "<tr>" +
                        //         "<td class='col-md-3'>The Posted Date</td>" +
                        //         "<td>Author</td>" +
                        //         "<td class='col-md-3'>Title</td>" +
                        //         "<td>Response</td>" +
                        //         "<td>The last Update</td>" +
                        //         "</tr>";
                        //     for(var i = 0; i < json.length; i++)
                        //     {
                        //         html = html+ "<tr>\
							// 		<td>"+json[i]['created_time']+"</td>\
							// 		<td>"+json[i]['name']+"</td>\
							// 		<td><a href=\"index.php?article_id="+json[i]['id']+"\">"+json[i]['title']+"</a></td>\
							// 		<td>"+json[i]['num']+"</td>\
							// 		<td>"+json[i]['last_update']+"</td>\
							// 	  </tr>"
                        //     }
                        //     $("#article_user").html(html);
                        // });
                        // $.post("article_dis.php",function (result){
                        //     var json = eval('(' + result + ')');
                        //     var html = "<tr>" +
                        //         "<td class='col-md-3'>The Posted Date</td>" +
                        //         "<td>Author</td>" +
                        //         "<td class='col-md-3'>Title</td>" +
                        //         "<td>Response</td>" +
                        //         "<td>The last Update</td>" +
                        //         "</tr>";
                        //     for(var i = 0; i < json.length; i++)
                        //     {
                        //         html = html + "<tr>\
							// 		<td>"+json[i]['created_time']+"</td>\
							// 		<td>"+json[i]['name']+"</td>\
							// 		<td><a href=\"index.php?article_id="+json[i]['id']+"\">"+json[i]['title']+"</a></td>\
							// 		<td>"+json[i]['num']+"</td>\
							// 		<td>"+json[i]['last_update']+"</td>\
							// 	  </tr>"
                        //     }
                        //     $("#article_all").html(html);
                        // });
                    }
            });

        }else{
            var form = new Object();
            form['article_id'] = $("#article_id").val();
            form['title'] = $("#title").val();
            form['content'] = $("#content_code").val();
            $.post("Article.php",form,function(result){
                if(result == "success")
                {
                    window.alert("Modified Successful!");
                    $("#cancel").click();
                    $.post("article_dis.php",{article_id:$("#article_id").val()},function(result){
                        var json = eval('(' + result + ')');
                        $("#article_title").html(json.title);
                        $("#article_info").html(json.name + " Updated On " + json.last_update);
                        var value = change(json.content);
                        function change (value)
                        {
                            value = value.replace(/<YOUTUBE>/g,"<iframe src=https://www.youtube.com/v/");
                            value = value.replace(/<\/YOUTUBE>/g,"\ width=\"500\" height=\"300\" frameborder=\"0\"></iframe>");
                            value = value.replace(/\n/g,"<br>");
                            value = value.replace(/<R>/g,"<span style=\"color:red;\">");
                            value = value.replace(/<\/R>/g,"</span>");
                            value = value.replace(/<B>/g,"<span style=\"color:blue;\">");
                            value = value.replace(/<\/B>/g,"</span>");
                            value = value.replace(/<G>/g,"<span style=\"color:green;\">");
                            value = value.replace(/<\/G>/g,"</span>");
                            return value;
                        }
                        $("#article_content").html(value);

                    });
                }
            });
        }
    });
    //JSON
    $("#edit").click(function () {
        $("#title_modal").html("Article Modification");
        $.post("article_dis.php",{article_id:$("#article_id").val()},function(result){
            var json = eval('(' + result + ')');
            $("#title").val(json.title);
            $("#content_code").val(json.content);
            var value = change($("#content_code").val());
            function change (value)
            {
                value = value.replace(/<YOUTUBE>/g,"(No Preview for the Video)<br>(Video ID:");
                value = value.replace(/<\/YOUTUBE>/g,")");
                value = value.replace(/\n/g,"<br>");
                value = value.replace(/<R>/g,"<span style=\"color:red;\">");
                value = value.replace(/<\/R>/g,"</span>");
                value = value.replace(/<B>/g,"<span style=\"color:blue;\">");
                value = value.replace(/<\/B>/g,"</span>");
                value = value.replace(/<G>/g,"<span style=\"color:green;\">");
                value = value.replace(/<\/G>/g,"</span>");
                return value;
            }
            $("#content_html").html(value);
        });
        $("#video").css("display","none");
        $("#videoID").html("");
        $("#content_html").css("display","none");
    });
    //JSON
    $("#Bresponse").click(function () {
        var form = $("#responseform").serializeArray();
        $.post("response.php",form,function(result){
            if(result == "success")
            {
                $.post("res_dis.php",form,function(result){
                    var json = eval('(' + result + ')');
                    var html = "";
                    for(var i = 0; i < json.length; i++)
                    {
                        html = html +"<tr class='col-md-11' style='margin-left: 5%'>" +
                            "<td class='col-md-1'>"+json[i].name+":</td>" +
                            "<td class='col-md-8'>"+json[i].message+"</td>" +
                            "<td class='col-md-2'>"+json[i].timestamp+"</td>" +
                            "</tr>";
                    }
                    $("#respondlist").html(html);
                });
                $("#response").val("");
            }
        });
    })
});
