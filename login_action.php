<?php

session_start(); 
include('functions.php'); 
$mail = $_POST['mail']; 
$password = $_POST['password'];

$pdo = connect_to_db(); 

$sql = 'SELECT * FROM user WHERE mail=:mail AND password = :password';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {   
    $val = $stmt ->fetch(PDO::FETCH_ASSOC);
    // var_dump($val);
    // exit();
    if (!$val) { 

    
        echo "<p>ログインに失敗しました。メールアドレスとパスワードをご確認の上、再度お試しください。</p>";
        echo '<a href="login.php">login</a>';
        exit();
    }else{
        $_SESSION = array(); 
        $_SESSION["session_id"] = session_id();
        $_SESSION["mail"] = $val["mail"];
        header("Location:todo_read.php");
        exit();
    }
}

function check_session_id()
{
   
    if (
        !isset($_SESSION['session_id']) || 
        $_SESSION['session_id'] != session_id() 
    ) {
        header('Location: login.php'); 
    } else {
        session_regenerate_id(true); 
        $_SESSION['session_id'] = session_id(); 
    }
}