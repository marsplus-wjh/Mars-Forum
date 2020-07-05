<?php
    $article_id = $_POST['article_id'];
    $id = $_POST['id'];
    $response = $_POST['response'];
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
    date_default_timezone_set("America/Montreal");
    $timestamp = date("Y-m-d H:i:s",time());
    $sql = "insert into Response (article_id,user_id,message,timestamp) values('".$article_id."','".$id."','".$response."','".$timestamp."') ";
    mysqli_query($conn,$sql);

    $sql = "update Article set last_update='".$timestamp."' where id='".$article_id."'";
    mysqli_query($conn,$sql);
    mysqli_close($conn);
echo "success";
?>