<?php
include('functions.php');

if (
  !isset($_POST['mail']) || $_POST['mail'] == '' ||
  !isset($_POST['password']) || $_POST['password'] == ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

$mail = $_POST["mail"];
$password = $_POST["password"];

$pdo = connect_to_db();

$sql = 'SELECT COUNT(*) FROM user WHERE mail=:mail';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
}

if ($stmt->fetchColumn() > 0) {
  echo "<p>すでに登録されているユーザです．</p>";
  echo '<a href="login.php">login</a>';
  exit();
}

$sql = 'INSERT INTO user(id, mail, password, created_at, updated_at) VALUES(NULL, :mail, :password, sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  header("Location:login.php");
  exit();
}
