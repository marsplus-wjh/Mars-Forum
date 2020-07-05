<?php
    error_reporting(E_ALL^E_NOTICE);
    //insert a new article
    if (!$_POST['article_id']){
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
        $time = date("Y-m-d H:i:s", time());
        $sql = "insert into Article (author_id,title,content,created_time,last_update) values('" . $_POST['id'] . "','" . $_POST['title'] . "','" . $_POST['content'] . "','" . $time . "','" . $time . "')";
        mysqli_query($conn, $sql);
        $sql = "select LAST_INSERT_ID()";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_row($res);
        mysqli_close($conn);
    } else{
        // update a exist article
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
        $time = date("Y-m-d H:i:s", time());
        $sql = "update Article set title='". $_POST['title'] ."', content='". $_POST['content'] ."',last_update='". $time ."' where id='". $_POST['article_id'] ."'";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
    }
echo "success";




