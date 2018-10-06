<?php
//0.外部ファイル読み込み
include('functions.php');

//1.GETでidを取得
if(!isset($_GET['id'])){
  exit("Error");
}
$id = $_GET['id'];

//2.DB接続など
$pdo = db_conn();

//２．データ登録SQL作成，指定したidのみ表示する
$stmt = $pdo->prepare('SELECT * FROM '. $table .' WHERE id=:id');
$stmt->bindValue(':id',$id, PDO::PARAM_INT);
$status = $stmt->execute();

// メニュー表示
$menu = '<a class="navbar-brand" href="select_nologin.php">ブックマーク一覧 </a>';

//３．データ表示
if($status==false){
  // エラーのとき
  errorMsg($stmt);
}else{
  // エラーでないとき
  $rs = $stmt->fetch();
  // fetch()で1レコードを取得して$rsに入れる
  // $rsは配列で返ってくる．$rs["id"], $rs["name"]などで値をとれる
  // var_dump()で見てみよう
}
?>

<!-- htmlは「index.php」とほぼ同じです -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>【登録詳細】</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
  <?=$menu?>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>【登録詳細】</legend>
     <p>名前：<?=$rs['name']?></p><br>
     <p>Email：<?=$rs['email']?></p><br>
     <p><?=$rs['detail']?></p><br>
     <!-- idは変えたくない = ユーザーから見えないようにする-->
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
