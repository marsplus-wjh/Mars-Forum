<?php session_start();
extract($_POST);
$error = "";
if(isset($name_login) && isset($email_login) && isset($passwd_login) && isset($conpasswd_login) && $name_login && $email_login && $passwd_login && $conpasswd_login) {
    $config = include 'config.php';
    $db_host = $config['db_host'];
    $db_user = $config['db_user'];
    $db_pwd = $config['db_pwd'];
    $db_name = $config['db_name'];
    $conn = mysqli_connect("$db_host", "$db_user", "$db_pwd");
    if (!$conn) {
        $error = "Can not connect to database";
    }
    mysqli_select_db($conn, $db_name);
    $sql = "select * from User where email='" . $email_login . "'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    if ($row) {
        $error = "This email is already exist";
    } else {
        if ($passwd_login == $conpasswd_login) {
            $sql = "insert into User (name,email,passwd) VALUE ('".$name_login."','".$email_login."','".$passwd_login."')";
            mysqli_query($conn, $sql);
            $sql = "select * from User WHERE email = '".$email_login."'";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($res);
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            mysqli_close($conn);
            echo "<script>
                    alert('Successful!');
                    window.location.href=\"index.php\"
                  </script>";
        } else if(strpos($email_login, '@' ) == false || strpos($email_login, '.') == false){
            $error = "Email Format is Incorrect!";
        }else{
            $error = "Passwords Should be Same";
        }
    }
}
elseif(!isset($name_login) && !isset($email_login) && !isset($passwd_login) && !isset($conpasswd_login)){
    $error = "All Blanks Should Fill Out";
}
else{
    $error = "All Blanks Should Fill Out";
}
echo $error;
?>
