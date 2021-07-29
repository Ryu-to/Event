<?php
session_start();
include("functions.php");
check_session_id();

$user_id = $_SESSION["id"];

$pdo = connect_to_db();


$sql = 'SELECT * FROM event_table LEFT OUTER JOIN (SELECT event_id, COUNT(id) AS cnt FROM likes GROUP BY event_id) AS likes ON event_table.id = likes.event_id';

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $output = "";
  foreach ($result as $record) {
    $output .= "<tr>";
    $output .= "<td>{$record["event"]}</td>";
    $output .= "<td><img src='{$record["image"]}' height=150px></td>";
    $output .= "<td>{$record["description"]}</td>";
    $output .= "<td>{$record["category"]}</td>";
    $output .= "<td>{$record["event_area"]}</td>";
    $output .= "<td>{$record["address"]}</td>";
    $output .= "<td>{$record["person"]}</td>";
    $output .= "<td>{$record["hour"]}</td>";
    $output .= "<td>{$record["price"]}</td>";
    $output .= "<td>{$record["reserve_limit"]}</td>";
    $output .= "<td>{$record["mini_person"]}</td>";
    $output .= "<td><a href='like_create.php?user_id={$user_id}&event_id={$record["id"]}'>&#9825;{$record["cnt"]}</a></td>";
    $output .= "<td><a href='event_edit.php?id={$record["id"]}'>Edit</a></td>";
    $output .= "<td><a href='event_delete.php?id={$record["id"]}'>Delete</a></td>";
    $output .= "</tr>";
  }
  unset($value);
}
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>イベントリスト</title>
</head>

<body>
  <fieldset>
    <legend>＃イベント一覧</legend>
    <!-- <p>こんにちは<?= $_SESSION['username'] ?></p> -->
    <a href="event_input.php">イベント登録</a>
    <table>
      <thead>
        <tr>
          <th>イベント名</th>
          <th>イベント内容</th>
          <th>カテゴリー</th>
          <th>開催エリア</th>
          <th>集合場所</th>
          <th>人数</th>
          <th>イベント時間</th>
          <th>料金</th>
          <th>開催決定期限</th>
          <th>最低開催人数</th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?= $output ?>
      </tbody>
    </table>
    <a href="logout.php">logout</a>
  </fieldset>
</body>

</html>