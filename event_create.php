<?php
// var_dump($_FILES);
// exit();

session_start();
include("functions.php");
check_session_id();

if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0) {
  // 送信が正常に行われたときの処理(この後記述)
  $uploaded_file_name = $_FILES['upfile']['name']; //ファイル名の取得
  $temp_path = $_FILES['upfile']['tmp_name']; //tmpフォルダの場所
  $directory_path = 'upload/';
  $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
  $unique_name = date('YmdHis') . md5(session_id()) . "." . $extension;
  $filename_to_save = $directory_path . $unique_name;

  if (is_uploaded_file($temp_path)) {
    if (move_uploaded_file($temp_path, $filename_to_save)) {
      chmod($filename_to_save, 0644); // 権限の変更
      // 今回権限を変更するところまで

    } else {
      exit('Error:アップロードできませんでした'); // 画像の保存に失敗
    }
  } else {
    exit('Error:画像がありません'); // tmpフォルダにデータがない
  }
} else {
  // 送られていない,エラーが発生,などの場合
  exit('Error:画像が送信されていません');
}

if (
!isset($_POST['event']) || $_POST['event'] == '' ||
!isset($_POST['description']) || $_POST['description'] == '' ||
!isset($_POST['category']) || $_POST['category'] == '' ||
!isset($_POST['event_area']) || $_POST['event_area'] == '' ||
!isset($_POST['address']) || $_POST['address'] == '' ||
!isset($_POST['person']) || $_POST['person'] == '' ||
!isset($_POST['hour']) || $_POST['hour'] == '' ||
!isset($_POST['price']) || $_POST['price'] == '' ||
!isset($_POST['reserve_limit']) || $_POST['reserve_limit'] == '' ||
!isset($_POST['mini_person']) || $_POST['mini_person'] == '' 
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

$event = $_POST['event'];
$description = $_POST['description'];
$category = $_POST['category'];
$event_area = $_POST['event_area'];
$address = $_POST['address'];
$person = $_POST['person'];
$hour = $_POST['hour'];
$price = $_POST['price'];
$reserve_limit = $_POST['reserve_limit'];
$mini_person = $_POST['mini_person'];

$pdo = connect_to_db();

$sql = 'INSERT INTO event_table(id,event, image, description,category,event_area,address,person,hour,price,reserve_limit,mini_person) VALUES (NULL,:event,:image, :description,:category,:event_area,:address,:person,:hour,:price,:reserve_limit,:mini_person)';


$stmt = $pdo->prepare($sql);
$stmt->bindValue(':event', $event, PDO::PARAM_STR);
$stmt->bindValue(':description', $description, PDO::PARAM_STR);
$stmt->bindValue(':category', $category, PDO::PARAM_STR);
$stmt->bindValue(':event_area', $event_area, PDO::PARAM_STR);
$stmt->bindValue(':address', $address, PDO::PARAM_STR);
$stmt->bindValue(':person', $person, PDO::PARAM_STR);
$stmt->bindValue(':hour', $hour, PDO::PARAM_STR);
$stmt->bindValue(':price', $price, PDO::PARAM_STR);
$stmt->bindValue(':reserve_limit', $reserve_limit, PDO::PARAM_STR);
$stmt->bindValue(':mini_person', $mini_person, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  header("Location:event_input.php");
  exit();
}
