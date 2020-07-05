<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mars Log In</title>
    <link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap-3.3.5-dist/jquery-2.1.4.min.js"></script>
    <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>

    <link href="amazeui/dist/css/amazeui.min.css" rel="stylesheet">
    <script src="amazeui/dist/js/amazeui.min.js"></script>

    <link rel = "Shortcut Icon" href="img/M.ico">

    <style>
        .navbar-form {  padding-right: 3px;  }
        .navbar {  margin: 0;  height: 51px; padding: 0; }
        #mars {  padding-right: 30px;  font-size: 20px;  color: seashell;  }
        #page {  padding-right: 30px;  font-size: 20px;  color: seashell;  }
        #pictures {  z-index: 100;  }
        #word1 {  position: absolute; top: 15%;  left: 15%;  font-size: 20px;  color: ivory;  }
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
        .modal-backdrop{z-index: 0}
    </style>

</head>
<body>

<!--navbar start-->
<nav class="navbar navbar-inverse">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#button"
                aria-expanded="false" style='margin:0;padding:0'>
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand active" id="mars" href="Login.php">Mars</a>
        <a class="navbar-brand active" id="page" href="personal.php">Personal Page</a>
    </div>
</nav>
<!--navbar over-->

<!--Log in-->
<?php session_start();
extract($_POST);

if(isset($email_login) && isset($passwd_login) && $email_login && $passwd_login){
    $config = include 'config.php';
    $db_host = $config['db_host'];
    $db_user = $config['db_user'];
    $db_pwd = $config['db_pwd'];
    $db_name = $config['db_name'];
    $conn = mysqli_connect("$db_host","$db_user","$db_pwd");
    if(! $conn){$error = "Can not connect to database";}
    mysqli_select_db($conn,$db_name);
    $sql = "select * from User where email='".$email_login."'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
    $passwd = $row['passwd'];
    if($row){
        if($passwd_login != $passwd)
        {
            $error = "Cannot Matching！";
            mysqli_close($conn);
        }else {
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            echo "<script>
                    window.location.href=\"./index.php\"
                  </script>";
        }
    }else{
        $error = "";
        mysqli_close($conn);
    }
} else if((isset($email_login) && !$email_login) || (isset($passwd_login) && !$passwd_login)){
    $error = "";
}
?>
<div style="width: 30%;height: 37%;z-index: 2;position: absolute;background-color: #FFFFFF;top: 11%;margin-left: 45%;border-radius: 10px;box-shadow: 15px 15px 15px #3c3c3c;">
    <p style="font-size: 25px;margin-top: 5%;margin-left: 40%;">Log In</p>
    <hr/>
    <form  action="Login.php" method="POST" class="form-inline">
        <div class="modal-body"
             style="height: 180px;background: url();margin: 0px;padding-top: 8%;padding-left: 15%">
            <div class="am-input-group" style="width: 90%">
                                                <span class="am-input-group-label"><i
                                                        class="am-icon-user am-icon-fw"></i></span>
               <input type="text" class="am-form-field" placeholder="Email" name="email_login">

            </div>
            <div class="am-input-group" style="width: 90%;margin-top: 7%">
                                                <span class="am-input-group-label"><i
                                                        class="am-icon-lock am-icon-fw"></i></span>
                <input type="password" class="am-form-field" placeholder="Password"
                       name="passwd_login">
            </div>
            <?php
            if(isset($error) && $error != "")
                echo"<div style='color: red;margin-left:10%;margin-top: 5%'>".$error."</div>"
            ?>
        </div>
        <div class="modal-footer">
            <button type="submit" class="am-btn am-btn-primary" data-toggle="modal" style="width: 25%;border-radius: 5px;position: absolute;top:75%;left: 65%" data-target="#myModal">
                Log In
            </button>
        </div>
    </form>
    <div>
        <form action="Login.php" method="POST" class="form-inline">
            <input type="hidden" name="email_login" value="Anonymous">
            <input type="hidden" name="passwd_login" value="Anonymous">
            <button type="submit" class="am-btn am-btn-danger" id="anonymous" style="width: 45%;border-radius: 5px;position: absolute;top:89%;left: 30%">
                Anonymous Login
            </button>
        </form>
    </div>
    <div>
        <button type="button" class="am-btn am-btn-success" data-toggle="modal" style="width: 50%;border-radius: 5px;position: absolute;top:75%;left: 5%" data-target="#myModal">
            Creat New Account
        </button>
        <!-- Modal -->

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel2" style="text-align: center">Sign Up</h4>
                    </div>
                    <div class="modal-body" style="background: url('img/desk.jpg');margin: 0px;padding-top: 0;">
                        <form  method="POST" class="form-inline" id="signup">
                                    <div class="form-group" style="margin-left: 30%;margin-bottom: 5%">
                                        <label style="color: #FFFFFF">Name</label><br>
                                        <input type="text" class="form-control" id="name" placeholder="Name"
                                               style="width: 60%" name="name_login"><br>
                                        <label for="exampleInputName" style="margin-top: 5%;color: #FFFFFF">E-Mail</label><br>
                                        <input type="text" class="form-control" id="email" placeholder="Email"
                                               style="width: 60%" name="email_login"><br>
                                        <label for="exampleInputName" style="margin-top: 5%;color: #FFFFFF">Password</label><br>
                                        <input type="password" class="form-control" id="pass" placeholder="Password"
                                               style="width: 60%" name="passwd_login">
                                        <label for="exampleInputName" style="margin-top: 5%;color: #FFFFFF">Confirm Password</label><br>
                                        <input type="password" class="form-control" id="conpass" placeholder="Confirm password"
                                               style="width: 60%;" name="conpasswd_login">
                                    </div>
                            <div style='color: #9A6060;margin-left:30%;width: 40%;height: 40px;background-color: pink;display: none;border-radius: 5px' id="warn">
                                <p style='margin-left: 5%;padding-top: 2%' id="warn_p"></p>
                            </div>
                    </div>
                    <div class="modal-footer" >
                        <button type="button" class="am-btn am-btn-success"
                                style="width: 60%;margin-right: 20%;border-radius: 5px" id="register">Creat</button>
                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--JSON-->
<script>
    $(document).ready(function(){
        $("#register").click(function(){
            var form = $("#signup").serializeArray();
            $.post("Signup.php",form,function (result) {
                if(result != "" ){
                    $("#warn_p").html(result);
                    $("#warn").css("display","block");
                }
            });
        });
    });
</script>

<!--picture start-->
<div class="img-responsive center-block" alt="Responsive image" id="pictures" style="margin: 0; padding: 0">
    <img width="100% \9" height="620px" src="img/ghost.jpg">
    <!--word-->
    <div id="word1">
        Welcome to Mars Forum<br>Login and have fun!<br>If you don't have any account,<br>please register one right now!
    </div>
</div>

<footer class="main-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <div class="widget">
                    <h4 class="title">
                        Latest Essay
                    </h4>
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
</body>
</html>
