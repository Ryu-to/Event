<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規登録</title>
  <link rel="stylesheet" type="text/css" href="registerPage.css">
</head>

<body>
  <div class="regi-form">
    <h1>新規登録</h1>
    <div class="container">
      <div class="main">
        <div class="form-img">
          <img src="img/undraw_neighbors_ciwb.svg">
        </div>
        <div class="content">
          <form action="register_action.php" method="POST">
            <input type="text" name="mail" placeholder="メールアドレス" required autofocus="">

            <input type="password" name="password" placeholder="パスワード" required autofocus="">

            <button class="btn" type="submit">登録</button>
          </form>
          <p class="account">アカウントをお持ちの方は<a href="login.php">ログイン</a></p>
        
        </div>
      </div>
    </div>
  </div>
</body>

</html>