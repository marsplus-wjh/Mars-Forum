<?php
 if(!isset($_POST['article_id']) && isset($_POST['id'])){
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
     $sql = "select User.name,Article.*,count(Response.id) as num from Article inner join User on Article.author_id = User.id left join Response on Response.article_id = Article.id where User.id = '".$_POST['id']."'group by Article.id order by Article.last_update desc";
     $res = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_array($res))
         $return[] = $row;
     mysqli_close($conn);
     echo json_encode($return);
 }
 else if(!isset($_POST['article_id']) && !isset($_POST['id']))
 {
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
     $sql = "select User.name,Article.*,count(Response.id) as num from Article inner join User on Article.author_id = User.id left join Response on Response.article_id = Article.id group by Article.id order by Article.last_update desc";
     $res = mysqli_query($conn,$sql);
     while($row = mysqli_fetch_array($res))
         $return[] = $row;
     mysqli_close($conn);
     echo json_encode($return);
 }
 else if(isset($_POST['article_id']))
 {
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
     $sql = "select Article.*,User.name from Article,User where User.id = Article.author_id and Article.id = '".$_POST['article_id']."'";
     $res = mysqli_query($conn, $sql);
     $row = mysqli_fetch_array($res);
     echo json_encode($row);
 }
