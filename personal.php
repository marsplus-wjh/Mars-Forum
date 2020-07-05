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
        .navbar {  margin: 0;  height: 51px; padding: 0; }
        #mars {  padding-right: 30px;  font-size: 20px;  color: seashell;  text-decoration: none}
        #page {  padding-right: 30px;  font-size: 20px;  color: seashell;  text-decoration: none}
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

        <!--
        /* Font Definitions */
        @font-face
        {font-family:Wingdings;
            panose-1:5 0 0 0 0 0 0 0 0 0;}
        @font-face
        {font-family:SimSun;
            panose-1:2 1 6 0 3 1 1 1 1 1;}
        @font-face
        {font-family:"Cambria Math";
            panose-1:2 4 5 3 5 4 6 3 2 4;}
        @font-face
        {font-family:Calibri;
            panose-1:2 15 5 2 2 2 4 3 2 4;}
        @font-face
        {font-family:"Segoe UI";
            panose-1:2 11 6 4 2 2 2 2 2 4;}
        @font-face
        {font-family:"\@SimSun";
            panose-1:2 1 6 0 3 1 1 1 1 1;}
        /* Style Definitions */
        p.MsoNormal, li.MsoNormal, div.MsoNormal
        {margin-top:0cm;
            margin-right:0cm;
            margin-bottom:10.0pt;
            margin-left:0cm;
            line-height:115%;
            font-size:11.0pt;
            font-family:"Calibri",sans-serif;}
        a:link, span.MsoHyperlink
        {color:blue;
            text-decoration:underline;}
        a:visited, span.MsoHyperlinkFollowed
        {color:purple;
            text-decoration:underline;}
        p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
        {mso-style-link:"Balloon Text Char";
            margin:0cm;
            margin-bottom:.0001pt;
            font-size:9.0pt;
            font-family:"Segoe UI",sans-serif;}
        p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
        {margin-top:0cm;
            margin-right:0cm;
            margin-bottom:10.0pt;
            margin-left:36.0pt;
            line-height:115%;
            font-size:11.0pt;
            font-family:"Calibri",sans-serif;}
        p.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst
        {margin-top:0cm;
            margin-right:0cm;
            margin-bottom:0cm;
            margin-left:36.0pt;
            margin-bottom:.0001pt;
            line-height:115%;
            font-size:11.0pt;
            font-family:"Calibri",sans-serif;}
        p.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle
        {margin-top:0cm;
            margin-right:0cm;
            margin-bottom:0cm;
            margin-left:36.0pt;
            margin-bottom:.0001pt;
            line-height:115%;
            font-size:11.0pt;
            font-family:"Calibri",sans-serif;}
        p.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast
        {margin-top:0cm;
            margin-right:0cm;
            margin-bottom:10.0pt;
            margin-left:36.0pt;
            line-height:115%;
            font-size:11.0pt;
            font-family:"Calibri",sans-serif;}
        span.BalloonTextChar
        {mso-style-name:"Balloon Text Char";
            mso-style-link:"Balloon Text";
            font-family:"Segoe UI",sans-serif;}
        .MsoChpDefault
        {font-size:11.0pt;
            font-family:"Calibri",sans-serif;}
        .MsoPapDefault
        {margin-bottom:10.0pt;
            line-height:115%;}
        @page WordSection1
        {size:612.0pt 792.0pt;
            margin:72.0pt 72.0pt 72.0pt 72.0pt;}
        div.WordSection1
        {page:WordSection1;}
        /* List Definitions */
        ol
        {margin-bottom:0cm;}
        ul
        {margin-bottom:0cm;}
        -->
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

<div class="info">
    <div class="photo" style="margin-bottom: 10px; margin-left: 48%">
        <img src="img/WangJiahui.jpg" width="100px">
    </div>
    <div class="content">
        <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:center;line-height:normal'><b><span lang=FR-CA style='font-size:
14.0pt;font-family:"Times New Roman",serif'>Jiahui Wang (Mars)<br>
</span></b><span lang=FR-CA style='font-size:12.0pt;font-family:"Times New Roman",serif'>Email:
</span><a href="mailto:wjhmars@gmail.com"><span lang=FR-CA style='color:windowtext;
text-decoration:none'>wjhmars@gmail.com</span></a></p>

        <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:center'><span style='font-size:12.0pt;line-height:115%;font-family:
"Times New Roman",serif'>Personal Page (Blog): </span><a
                href="http://www.marspang.top/MarsForum/personal.php">http://www.marspang.top/MarsForum/personal.php</a></p>

        <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:center'>GitHub: <a href="https://github.com/marsplus-wjh">https://github.com/marsplus-wjh</a></p>

        <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
text-align:center'><span style='font-size:12.0pt;line-height:115%;font-family:
"Times New Roman",serif'>Phone: (514) 430 - 6663</span><span lang=FR-CA
                                                             style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'><br>
<b><u>_______________________________________________________________________________________________________________________</u></b></span></p>

        <div id="wordcontent" style="margin-top: 2%;width: 50%; margin-left: 33%;">
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt'><b><u><span
                        style='font-size:14.0pt;line-height:115%;font-family:"Times New Roman",serif'>Work
Experience<br>
</span></u></b><b><span style='font-size:12.0pt;line-height:115%;font-family:
"Times New Roman",serif'>Chinasoft International (CSI)                                                                    </span></b><span
                style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>Aug.
2016 – Feb. 2017<b><br>
</b><i>Junior Software Developer<br>
</i>• Technical and Professional Group, Huawei Team;<br>
<a name="_Hlk5111229">• </a>Interior Customer and Supplier Management System
update;</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt'><span
                style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>•
Data operation and analysis by Hadoop HDFS, MapReduce, displayed by Java Spring</span><span
                style='font-size:10.0pt;line-height:115%;font-family:"Times New Roman",serif'><br>
<br>
</span><b><u><span style='font-size:14.0pt;line-height:115%;font-family:"Times New Roman",serif'>Education
Background</span></u></b><u><span style='font-size:10.0pt;line-height:115%;
font-family:"Times New Roman",serif'> <br>
</span></u><b><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>Concordia
University</span></b><span style='font-size:12.0pt;line-height:115%;font-family:
"Times New Roman",serif'> - Montreal, QC                                                         Jan.
2018 – Aug. 2020<u><br>
</u>Master of Applied Computer Science</span><b><span style='font-family:"Times New Roman",serif'><br>
<br>
</span></b><b><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>Taiyuan
University of Technology</span></b><span style='font-size:12.0pt;line-height:
115%;font-family:"Times New Roman",serif'> - Taiyuan,
China                                 Sept. 2013 – Jun. 2017<u><br>
</u>Bachelor of Software Engineering<br>
<br>
</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt'><b><u><span
                        style='font-size:14.0pt;line-height:115%;font-family:"Times New Roman",serif'>Project
Experiences</span></u></b><span style='font-size:12.0pt;line-height:115%;
font-family:"Times New Roman",serif'> </span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt'><span
                style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>-
Customer and Supplier Data Analyse in CSI Huawei Team</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt'><span
                style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>            -
Supplier Behavior Evaluation System, to analysis suppliers’ behavior by
Hadoop   </span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt'><span
                style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>            -
Delivery Management, support optimization team to increase accuracy performance</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt'><span
                style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>-
Mars Forum Full-Stack Development </span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt'><span
                style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>            -
Address: </span><a href="http://www.marspang.top/MarsForum/Login.php">http://www.marspang.top/MarsForum/Login.php</a></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-indent:
36.0pt'><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>-
Front-end used Bootstrap &amp; Amaze UI, JavaScript &amp; Ajax, Html &amp; CSS</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-indent:
36.0pt'><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>-
Back-end implemented by PHP and MySQL database.</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-indent:
36.0pt'><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>-
Running in AWS cloud server </span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt'><span
                style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>-
StarWars Html5 Shooting Game</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-indent:
36.0pt'><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>-
Address: </span><a href="http://www.marspang.top/StarWars/">http://www.marspang.top/StarWars/</a></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-indent:
36.0pt'><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>-
Based on Html5 standard web application, controlled by JavaScript<br>
- Panorama Picture Processing implemented by OpenCV, C++</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt'><span
                style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>-
Risk Game which is a strategy chess game implemented by Java and GUI<br>
- Http Client and Server protocol used TCP/UDP used Python Socket</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt'><b><u><span
                        style='font-size:14.0pt;line-height:115%;font-family:"Times New Roman",serif'><br>
Specialities<br>
</span></u></b><span style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>-
Python &amp; PHP &amp; Java</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt'><span
                style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>-
Big Data analyse, familiar with Hadoop HDFS system and MapReduce, and Spark  </span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt'><span
                style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>-
Full-Stack development, Java Spring, ThinkPHP and Bootstrap, Html, CSS,
JavaScript</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt'><span
                style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>-
Web support services such as Rest API, MySQL and HBase  </span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt'><span
                style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>-</span><b><span
                    style='font-size:14.0pt;line-height:115%;font-family:"Times New Roman",serif'> </span></b><span
                style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>Computer
Vision: Image Processing, OpenCV</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt'><span
                style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>-
Pattern Recognition: Bayesian Decision, Linear Discriminant, Numpy, Pandas,
scikit-learn</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt'><span
                style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>-</span><b><span
                    style='font-size:14.0pt;line-height:115%;font-family:"Times New Roman",serif'> </span></b><span
                style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>Linux
system, RHCE (Red Hat Certification Program)<br>
- Junit Test Framework, Javadoc, Docker and GitHub</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt'><span
                style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'>&nbsp;</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt'><span
                style='font-size:12.0pt;line-height:115%;font-family:"Times New Roman",serif'><br>
<br>
<br>
</span></p>
        </div>
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