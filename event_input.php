<?php
session_start();
include("functions.php");
check_session_id();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>イベント登録</title>
</head>

<body>
  <form action="event_create.php" method="POST">
    <fieldset>
      <legend></legend>
      <a href="event_read.php">一覧</a>
      <a href="logout.php">logout</a>
      <div>
        event: <input type="text" name="event">
      </div>
      <div>
        description: <input type="text" name="description">
      </div>
      <div>
        category: <input type="text" name="category">
      </div>
      <div>
        event_area: <input type="text" name="event_area">
      </div>
      <div>
        event_url: <input type="text" name="event_url">
      </div>
      <div>
        address: <input type="text" name="address">
      </div>
      <div>
        person: <input type="text" name="person">
      </div>
      <div>
        hour: <input type="text" name="hour">
      </div>
      <div>
        price: <input type="text" name="price">
      </div>
      <div>
        reserve_limit: <input type="date" name="reserve_limit">
      </div>
      <div>
        mini_person: <input type="text" name="mini_person">
      </div>
      </div>
      <div>
        <button>登録</button>
      </div>
    </fieldset>
  </form>

</body>

</html>