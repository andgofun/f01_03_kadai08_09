<?php
include('functions.php');

session_start();
chk_ssid();


// メニュー表示
  $menu = '<a class="navbar-brand" href="user_select.php">ユーザー管理</a><a class="navbar-brand" href="user_index.php">ユーザー登録</a>';
  $menu .= '<a class="navbar-brand" href="logout.php">ログアウト</a>';

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザー登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">
      <?=$menu?>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="user_insert.php">
  <div class="jumbotron">
   <fieldset>
   <label>名前：<input type="text" name="name"></label><br>
    <label>lid：<input type="text" name="lid"></label><br>
    <label>lpw：<input type="text" name="lpw"></label><br>
    <label>kanri_flg：
      <input type="radio" name="kanri_flg" value="0" checked>一般
      <input type="radio" name="kanri_flg" value="1">管理者
    </label><br>
    <label>life_flg：
      <input type="radio" name="life_flg" value="0" checked>利用中
      <input type="radio" name="life_flg" value="1">退会済
    </label><br>
    <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
