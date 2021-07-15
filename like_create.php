<?php
// var_dump($_GET);
// exit();
include('functions.php');

$pdo = connect_to_db();

$user_id = $_GET["user_id"];
$event_id = $_GET["event_id"];

$sql = 'SELECT COUNT(*) FROM likes WHERE user_id=:user_id AND event_id=:event_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':event_id', $event_id, PDO::PARAM_INT);
$status = $stmt->execute();
if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $like_count = $stmt->fetch();

    if ($like_count[0] != 0) {
        $sql = "DELETE FROM likes WHERE user_id = :user_id AND event_id = :event_id";
    } else {
        $sql = "INSERT INTO likes(id, user_id, event_id, created_at) VALUES(NULL, :user_id, :event_id, sysdate())";
    }

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindValue(':event_id', $event_id, PDO::PARAM_INT);
    $status = $stmt->execute();
    // var_dump($like_count);
    // exit();

    if ($status == false) {
        $error = $stmt->errorInfo();
        echo json_encode(["error_msg" => "{$error[2]}"]);
        exit();
    } else {
        header("Location:event_read.php");
        exit();
    }
}
