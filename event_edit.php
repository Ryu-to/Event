<?php
session_start();
include("functions.php");
check_session_id();

$id = $_GET["id"];

$pdo = connect_to_db();

$sql = 'SELECT * FROM event_table WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $record = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>

<body>
  <form action="event_update.php" method="POST">
    <fieldset>
      <legend></legend>
      <a href="event_read.php">＃イベント一覧</a>
      <div>
        <div>
          event: <input type="text" name="event" value="<?= $record["todo"] ?>">
        </div>
        <div>
          description: <input type=" text" name="description" value="<?= $record["description"] ?>">
        </div>
        <div>
          category: <input type=" text" name="category" value="<?= $record["category"] ?>">
        </div>
        <div>
          event_area: <input type=" text" name="event_area" value="<?= $record["event_area"] ?>">
        </div>
        <div>
          event_url: <input type=" text" name="event_url" value="<?= $record["todo"] ?>">
        </div>
        <div>
          address: <input type=" text" name="address" value="<?= $record["todo"] ?>">
        </div>
        <div>
          person: <input type=" text" name="person" value="<?= $record["todo"] ?>">
        </div>
        <div>
          hour: <input type=" text" name="hour" value="<?= $record["todo"] ?>">
        </div>
        <div>
          price: <input type=" text" name="price" value="<?= $record["todo"] ?>">
        </div>
        <div>
          reserve_limit: <input type=" date" name="reserve_limit" value="<?= $record["todo"] ?>">
        </div>
        <div>
          mini_person: <input type=" text" name="mini_person" value="<?= $record["todo"] ?>">
        </div>

        <div>
          <button>更新</button>
        </div>
        <input type="hidden" name="id" value="<?= $record["id"] ?>">
    </fieldset>
  </form>

</body>

</html>