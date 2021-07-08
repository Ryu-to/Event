<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン</title>
  <link rel="stylesheet" type="text/css" href="loginPage.css">
</head>

<body>
  <div class="login-form">
    <h1>ログイン</h1>
    <div class="container">
      <div class="main">
        <div class="content">
          <form action="login_action.php" method="POST">
            <input type="text" name="mail" placeholder="メールアドレス" required autofocus="">

            <input type="password" name="password" placeholder="パスワード" required autofocus="">

            <button class="btn" id="login" type="submit">ログイン</button>
          </form>
          <p class="account">アカウントを持っていない方はこちらから<a href="register.php">登録</a></p>
        </div>
        <div class="form-img">
          <img src="img/undraw_Login_re_4vu2.svg">
        </div><!-- </fieldset> -->

      </div>
    </div>
  </div>
</body>

</html>