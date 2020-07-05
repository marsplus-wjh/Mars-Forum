<?php session_start();
if(!isset($_SESSION['id'])){
    echo "<script>window.location.href=\"Login.php\"</script>";
}
if(isset($_GET['logout']) && $_GET['logout']){  //Logout
    session_destroy();
    echo "<script>window.location.href=\"Login.php\"</script>";
}
$name = $_SESSION['name'];
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mars</title>
    <link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap-3.3.5-dist/jquery-2.1.4.min.js"></script>
    <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <link href="amazeui/dist/css/amazeui.min.css" rel="stylesheet">
    <script src="amazeui/dist/js/amazeui.min.js"></script>

    <script type = "text/javascript" src="button.js?time=202002115"></script>

    <link rel = "Shortcut Icon" href="img/M.ico">

    <style>
        a:hover{  text-decoration:none;  }
        .row{width: 100%}
        .navbar {  margin-bottom: 0px;  height: 51px;  }
        #mars {  padding-right: 30px;  font-size: 20px;  color: seashell;  }
        .main-footer{
            background-color:#222222;  padding: 35px 0px 0px;  color: #959595;  line-height: 1.75em;
            font-family:  "Helvetica Neue",Helvetica,Arial,"Hiragino Sans GB","Hiragino Sans GB W3","WenQuanYi Micro Hei","Microsoft YaHei UI","Microsoft YaHei",sans-serif;
            font-size: 14px;  height: 366.66px;  border-bottom-width: 1px;  border-bottom-color:#333333;  border-bottom-style: solid;  }
        .container-fluid{  width: 1170px;  }
        .widget{  padding: 0px 30px;  width: 360px;  height: 296.6px;  padding-bottom: 30px;  }
        .main-footer .widget .title{  color: #fff;  border-bottom-width: 1px;  border-bottom-color:#eb9316;
            border-bottom-style: solid;  }
        .widget .title{  margin-top: 0px;  padding-bottom: 7px;  margin-bottom: 21px;  position:relative;  }
        h4{  font-size: 25px;  font-weight: 400;  font-family: inherit;  }
        .content{  padding-bottom: 10px;  }
        .recent-single-post{  height: 75px;  width: 300px;  padding-top: 6px;  padding-bottom: 6px;  margin-top: 6px;
            margin-bottom: 6px;  border-bottom-color: #333333;  border-bottom-width: 1px;  border-bottom-style: dashed;  }
        .copyright{  width: 100%;  height: 81.5px;  background-color:#101010;  padding-top: 27px ;  }
        .col-sm-12{  text-align: center;  }

    </style>

</head>
<body>

<!--navbar start-->
<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#button"
                aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand active" id="mars" href="index.php?logout=1">Mars</a>
    </div>


    <div class="collapse navbar-collapse">
        <ul>
            <li class="nav"><a href="index.php" style="padding: 0"><p style="position: absolute;top:25%;margin-left: 80%;color: snow">Home</p></a></li>
            <li class="nav"><a href="index.php?logout=1" style="padding: 0"><p style="position: absolute;top:25%;margin-left: 85%;color: snow">Log Out</p></a></li>
        </ul>
    </div><!-- /.container-fluid -->
</nav>
<!--navbar over-->
<div>
    <?php
        echo "<h2 style='margin-top:1%;margin-left: 1%'>Welcome back, ".$name."!</h2>"
    ?>
    <?php echo "<input type=\"hidden\" id=\"uid\" value=\"".$_SESSION['id']."\">"; ?>
</div>
<?php
if(isset($_GET['article_id'])) {
    $id = $_GET['article_id'];
    $config = include 'config.php';
    $db_host = $config['db_host'];
    $db_user = $config['db_user'];
    $db_pwd = $config['db_pwd'];
    $db_name = $config['db_name'];
    $conn = mysqli_connect("$db_host", "$db_user", "$db_pwd");
    if (!$conn) {
        echo "Can not connect to database";
    }
    mysqli_select_db($conn, $db_name);
    $sql = "select Article.*,User.name from Article,User where User.id = Article.author_id and Article.id = '" . $id . "'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    echo "
        <div class='col-md-12' style='margin: 0;padding: 0;'>
        <div class='col-md-6'>
        <p id='article_title' style='font-size: 40px;color: #009390;margin-left: 5%;'>" . $row['title'] . "</p>
        <p id='article_info' style='margin-left:5%;font-style: italic;color: gray;'>" . $row['name'] . " Updated On " . $row['last_update'] . "</p>
        </div>
        ";
    if ($row['author_id'] == $_SESSION['id']) {
        echo "
                <div class='col-md-offset-9' style='margin-top: 6%'>
                <!--<a href='Article.php?article_id=" . $row['id'] . "&edit=1'>-->
                <button id='edit' class=\"am-btn am-btn-success am-btn-xs am-round\" data-toggle=\"modal\" data-target=\".bs-example-modal-lg\"><span class=\"glyphicon glyphicon-pencil\"></span> Edit</button>
                <!--</a>-->
                <a href='index.php?article_id=" . $row['id'] . "&delete=1'><button class=\"am-btn am-btn-danger am-btn-xs am-round\"><span class=\"glyphicon glyphicon-remove\"></span> Delete</button></a>
                <input type=\"hidden\" id=\"article_id\" value =".$row['id'].">
                </div>";
        if (isset($_GET['delete'])) {
            $article_id = $_GET['article_id'];
            $config = include 'config.php';
            $db_host = $config['db_host'];
            $db_user = $config['db_user'];
            $db_pwd = $config['db_pwd'];
            $db_name = $config['db_name'];
            $conn = mysqli_connect("$db_host", "$db_user", "$db_pwd");
            if (!$conn) {
                echo "Can not connect to database";
            }
            mysqli_select_db($conn, $db_name);
            $sql = "delete from Article where id = '" . $article_id . "'";
            mysqli_query($conn, $sql);
            $sql = "delete from Response WHERE article_id = '" . $article_id . "'";
            mysqli_query($conn, $sql);
            mysqli_close($conn);
            echo "<script>alert('Delete successful');window.location.href='index.php'</script>";
        }
        echo "</div>
            ";
    }
    $row['content'] = str_replace("<YOUTUBE>","<iframe src=https://www.youtube.com/watch?v=",$row['content']);
    $row['content'] = str_replace("</YOUTUBE>","\ width=\"500\" height=\"300\" frameborder=\"0\"></iframe>",$row['content']);
    $row['content'] = str_replace("\n","<br>",$row['content']);
    $row['content'] = str_replace("<R>","<span style=\"color:red;\">",$row['content']);
    $row['content'] = str_replace("</R>","</span>",$row['content']);
    $row['content'] = str_replace("<B>","<span style=\"color:blue;\">",$row['content']);
    $row['content'] = str_replace("</B>","</span>",$row['content']);
    $row['content'] = str_replace("<G>","<span style=\"color:green;\">",$row['content']);
    $row['content'] = str_replace("</G>","</span>",$row['content']);
    echo "<hr style='width: 90%;margin-left: 5%'>
        <div id='article_content' class='col-md-10 col-md-offset-1' style='font-size: 20px'>
        " . $row['content'] . "
        </div>
        ";
    echo "<hr style='width: 90%;margin-left: 5%;margin-top: 10%;'>
              <div style='margin-left: 5%'> 
              <h2><span class=\"glyphicon glyphicon-comment\" aria-hidden=\"true\"></span> Response</h2>
              <form class=\"form-inline\" id=\"responseform\">
              <label for=\"exampleInputName2\">" . $name . ":</label>
              <input type=\"hidden\" name=\"article_id\" value=\"" . $_GET['article_id'] . "\">
              <input type=\"hidden\" name=\"id\" value=\"".$_SESSION['id']."\">
              <input type='text' name='response' id='response' class=\"form-control\" placeholder='Give a comment to this article...' style='width: 40%;margin-left: 1%;height: 30px;font-size: 15px'>
              <button type=\"button\" class=\"btn btn-primary btn-sm\" style='margin-left: 1%' id=\"Bresponse\">Submit</button>
              </form>
              </div>
              <div>
              <table class=\"table table-striped\" style='margin-top:4%;' id='respondlist'>";
        $config = include 'config.php';
        $db_host = $config['db_host'];
        $db_user = $config['db_user'];
        $db_pwd = $config['db_pwd'];
        $db_name = $config['db_name'];
        $conn = mysqli_connect("$db_host", "$db_user", "$db_pwd");
        if (!$conn) {
            echo "Can not connect to database";
        }
        mysqli_select_db($conn, $db_name);
        $sql = "select User.*,Response.* from Response LEFT JOIN User ON Response.user_id = User.id WHERE article_id = '".$_GET['article_id']."' ORDER BY Response.timestamp DESC";
        $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($res)) {
        echo "
              <tr class='col-md-11' style='margin-left: 5%'>
              <td class='col-md-1'>" . $row['name'] . ":</td>
              <td class='col-md-8'>" . $row['message'] . "</td>
              <td class='col-md-2'>" . $row['timestamp'] . "</td>
              </tr>
        ";
    }
    echo "</table></div>";
}else {
    echo "<div class='row' style='margin-top: 1%'>
		  <div class='col-md-offset-9'>
		  <button type='button' class='btn btn-primary' id='new' data-toggle=\"modal\" data-target=\".bs-example-modal-lg\">
		  <a style='color:white;text-decoration: none;'><span class=\"glyphicon glyphicon-edit\" aria-hidden=\"true\"></span> New Post</a>
		  </button>
		  </div>
		  </div>
		  <div class='row'>
		  <div class='col-md-4 col-md-offset-1'><h2 style='color:#009390;'><span class=\"glyphicon glyphicon-send\" aria-hidden=\"true\"></span> Your Recent Articles and Responses</h2></div>
		  <div class='col-md-10 col-md-offset-1'>
		  <table class='table table-striped' id='article_user'>
		  <tr>
			<td class='col-md-3'>Posted Date</td>
		    <td>Author</td>
			<td class='col-md-3'>Title</td>
			<td>Response</td>
			<td>The Last Update</td>
			</tr>
		  ";
    echo "<input type=\"hidden\" id = \"article_id\">";
    $config = include 'config.php';
    $db_host = $config['db_host'];
    $db_user = $config['db_user'];
    $db_pwd = $config['db_pwd'];
    $db_name = $config['db_name'];
    $conn = mysqli_connect("$db_host", "$db_user", "$db_pwd");
    if (!$conn) {
        echo "Can not connect to database";
    }
    mysqli_select_db($conn, $db_name);
    $sql1 = "select * from Article WHERE author_id = '".$id."' ORDER BY last_update DESC";
    $res1 = mysqli_query($conn, $sql1);
    while ($row1 = mysqli_fetch_array($res1)) {
        $article_id = $row1['id'];
        $sql2 = "select COUNT(Response.id) as count from Response WHERE article_id = '".$article_id."'";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_array($res2);
        echo "
            <tr>
				<td>".$row1['created_time']."</td>
			    <td>".$name."</td>
				<td><a href='index.php?article_id=".$article_id."'>".$row1['title']."</a></td>
			    <td>".$row2['count']."</td>
			    <td>".$row1['last_update']."</td>
			</tr>
        ";
    }
    echo "</table></div></div></div>";

    echo "<div class='row' style='margin-top: 3%'>
		  <div class='col-md-8 col-md-offset-1'><h2 style='color:#009390;'><span class=\"glyphicon glyphicon-th-list\" aria-hidden=\"true\"></span> Articles List</h2></div>
		  <div class='col-md-10 col-md-offset-1'>
		  <table class='table table-striped' id='article_all'>
		  <tr>
		  <td class='col-md-3'>Posted Date</td>
		  <td>Author</td>
		  <td class='col-md-3'>Title</td>
		  <td>Response</td>
		  <td>The Last Update</td>
		  </tr>
		  ";
    $config = include 'config.php';
    $db_host = $config['db_host'];
    $db_user = $config['db_user'];
    $db_pwd = $config['db_pwd'];
    $db_name = $config['db_name'];
    $conn = mysqli_connect("$db_host", "$db_user", "$db_pwd");
    if (!$conn) {
        echo "Can not connect to database";
    }
    mysqli_select_db($conn, $db_name);
    $sql1 = "select * from Article ORDER BY last_update DESC";
    $res1 = mysqli_query($conn, $sql1);
    while ($row1 = mysqli_fetch_array($res1)) {
        $article_id = $row1['id'];
        $author_id = $row1['author_id'];
        $sql2 = "select name from User WHERE id = '".$author_id."'";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_array($res2);
        $sql3 = "select COUNT(Response.id) as count from Response WHERE article_id = '".$article_id."'";
        $res3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_array($res3);
        echo "
            <tr>
				<td>".$row1['created_time']."</td>
			    <td>".$row2['name']."</td>
				<td><a href='index.php?article_id=".$article_id."'>".$row1['title']."</a></td>
			    <td>".$row3['count']."</td>
			    <td>".$row1['last_update']."</td>
			</tr>
        ";
    }
    echo "</table></div></div></div>";

}
?>

<footer class="main-footer" style="margin-top: 5%">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <div class="widget">
                    <h4 class="title">Latest Essay</h4>
                    <?php
                    $config = include 'config.php';
                    $db_host = $config['db_host'];
                    $db_user = $config['db_user'];
                    $db_pwd = $config['db_pwd'];
                    $db_name = $config['db_name'];
                    $conn = mysqli_connect("$db_host","$db_user","$db_pwd");
                    if(! $conn){echo "Can not connect to database";}
                    mysqli_select_db($conn,$db_name);
                    $sql = "select Article.*,User.* from Article,User WHERE Article.author_id = User.id ORDER BY last_update DESC limit 3";
                    $res = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($res)) {
                        $author_id = $row['author_id'];
                        echo "<div class='content recent-post'>
                        <div class='recent-single-post'>
                            <h2>".$row['title']."</h2>
                            <p>Author:".$row['name']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTime:".$row['last_update']."</p>
                        </div>
                    </div>";
                    }
                        ?>
</div>
</div>
<div class="col-sm-4">
    <div class="widget">
        <h4 class="title" style="margin-bottom: 10px">Focus on</h4>
        <div style="margin-left: 92px">
            <span>WeChat Account</span>
        </div>
        <div style="margin-top: 10px;margin-left: 70px;padding-right: 30px">
            <img src="img/wechat.jpg" width="150px">
        </div>
        <div class="focus" style="margin-top: 20px;margin-left: 70px" >
            <a href="http://weibo.com/u/5082514000" role="button" target="_blank">
                        <span class="weibo" style="margin-right: 13px">
                        <img src="img/weibo.png" height="60px">
                        </span>
            </a>
            <a href="https://github.com/marsplus-wjh" role="button" target="_blank">
                        <span class="github" style="margin-left: 13px">
                            <img src="img/github.png" height="60px" width="60px" class="img-circle" alt="Responsive image">
                        </span>
            </a>

        </div>
    </div>
</div>

<div class="col-sm-4">
    <div class="widget">
        <h4 class="title">Reference</h4>
        <div class="content recent-post">
            <div class="recent-single-post">
                <div style="margin-left: 70px">
                    <a href="http://www.bootcss.com/" role="button" target="_blank">
                        <img src="img/boot.png" width="170px" height="55px">
                    </a>
                </div>
            </div>
            <div class="recent-single-post">
                <div style="margin-left: 70px">
                    <a href="http://dev.mysql.com/" role="button" target="_blank">
                        <img src="img/mysql.gif" width="170px" height="55px">
                    </a>
                </div>
            </div>
            <div class="recent-single-post">
                <div style="margin-left: 70px;margin-top: 7px" >
                    <a href="http://php.net/" role="button" target="_blank">
                        <img src="img/php.jpg" width="170px" height="55px">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

</div>
</footer>
<div class="copyright">
    <div class="col-sm-12">
        <span style="color:#444444;font-size: 15px">Copyright © Wang, Jia Hui</span>
    </div>
</div>
<div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" style="background-color: white;border-radius: 10px">
        <div class="modal-header" style="margin-bottom: 3%">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" style="text-align: center;font-family: 'Al Bayan'" id="title_modal">The New Topic</h4>
        </div>
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 2%;margin-left: 2%">
                <form id="form_article">
                    <div style="width: 70%;margin-left: 15%">
                    <div style="margin-bottom: 5%">
                        <label style="float: left;margin-right: 5%">Title</label>
                        <input id="title" type="input" class="form-control" name="title" placeholder="Title" style="width: 70%;position: relative;">
                    </div>
                    <div class="form-group" style="margin-bottom: 10%">
                        <label for="exampleInputEmail1" style="margin-right: 4%">Content</label>
                        <button type="button" id="code" class="btn btn-default">Text</button>
                        <button type="button" id="html" class="btn btn-default " style="margin-right: 3%">Preview</button>
                        <button type="button" id="bvideo" class="btn btn-default btn-sm"  aria-label="Left Align"><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span></button>
                        <button type="button" id="Strong" class="btn btn-default btn-sm"  aria-label="Left Align"><span class="glyphicon glyphicon-bold" aria-hidden="true"></span></button>
                        <button type="button" id="em" class="btn btn-default btn-sm"  aria-label="Left Align"><span class="glyphicon glyphicon-italic" aria-hidden="true"></span></button>
                        <button type="button" id="R" class="btn btn-danger btn-sm"  aria-label="Left Align"><span class="glyphicon glyphicon-font" aria-hidden="true"></span></button>
                        <button type="button" id="B" class="btn btn-primary btn-sm"  aria-label="Left Align"><span class="glyphicon glyphicon-font" aria-hidden="true"></span></button>
                        <button type="button" id="G" class="btn btn-success btn-sm" aria-label="Left Align"><span class="glyphicon glyphicon-font" aria-hidden="true"></span></button>
                        <div id="video" style="margin-top: 2%;  display: none;">
                            <div style="margin-right: 0px">
                                <p style="color: #3c3c3c;margin: 0;padding: 0;font-size: 14px">Insert a Youtube Video</p>
                            </div>
                            <div>
                                <input id="URL" type="input" readonly class="form-control" name="URL" placeholder="https://www.youtube.com/watch?v=" style="width: 40%;font-size: 10px;margin-bottom: 1%;height: 5%;float: left">
                                <input id="videoID" type="input" class="form-control" name="videoID" placeholder="Video ID" style="width: 20%;float: left;height: 5%;font-size: 10px;margin-right: 2%">
                            </div>
                            <div>
                                <button type="button" id="insert_video" class="btn btn-default btn-sm">Insert</button>
                            </div>
                        </div>
                        <textarea class="form-control" id="content_code" name="content" placeholder="Content" rows="10" style="margin-top: 5%"></textarea>
                        <div id="content_html" name="content_html" style="margin-top: 2%; margin-bottom: 2%"></div>
                        </div>
                        </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal" id="cancel">Cancel</button>
                        <button type="button" id="create" class="btn btn-success">Submit</button>
                        <?php
                        echo "<input type=\"hidden\" name=\"id\" value=\"".$_SESSION['id']."\"\>";
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
