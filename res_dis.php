<?php
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
$sql = "select User.*,Response.* from Response LEFT JOIN User ON Response.user_id = User.id WHERE article_id = '".$_POST['article_id']."' ORDER BY Response.timestamp DESC";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($res)) {
    $return[] = $row;
}
echo json_encode($return);
?>