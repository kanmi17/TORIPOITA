<?php
        session_start();
        include_once 'login copy.php';

        if(empty($_SESSION['email'])) {
            header("Location: index.php");
          }
          

// ユーザーIDからユーザー名を取り出す
$query = "SELECT * FROM OITATRIP WHERE name=:name AND comment=:comment";
$result = $mysqli->query($query);

$result = $mysqli->query($query);
if (!$result) {
  print('クエリーが失敗しました。' . $mysqli->error);
  $mysqli->close();
  exit();
}

while ($row = $result->fetch_assoc()) {
    $username = $row['email'];
    $email = $row['password'];
  }
  
  // データベースの切断
  $result->close();
  ?>

  
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PHPのマイページ機能</title>
<link rel="stylesheet" href="style.css">
<!-- Bootstrap読み込み（スタイリングのため） -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
</head>
</head>
<body>
<div class="col-xs-6 col-xs-offset-3">

<h1>プロフィール</h1>
<ul>
  <li>名前：<?php echo $username; ?></li>
  <li>メールアドレス：<?php echo $email; ?></li>
</ul>
<a href="logout.php?logout">ログアウト</a>

</div>
</body>
</html>