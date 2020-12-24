<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8"> 
        <title>とりっぷ🐓ツアーリクエスト</title>
        <link rel="stylesheet" href="./request.css">
    </head>

    <body>
    <header>
        <div class = "header-left">
            <a href="top.html">おおいたとりっぷ🐓</a>
        </div>
    </header>
    <div class = "top-wrapper">
        <h1>リクエスト画面</h1>  
    <form action="" method="post">
    <div class="form-item">お名前</div>
        <input type="text" name="name" 
        placeholder="お名前">
        <div class="form-item">メールアドレス</div>
        <input type="text"name="email2" size = 40 
        placeholder="再度メールアドレスを入力してください">
        <div class="form-item">リクエストの種類</div>
        <?php 
          $types = array('既存のツアー行程に関するリクエスト','新しいツアーのご提案','システムに関するリクエスト' );
         ?>
        <select name="category">
        <option value="未選択">選択してください</option>
           <?php
             foreach ($types as $type) {
              echo "<option value='{$type}'>{$type}</option>";
             }
           ?>
        </select><br>
        <div class="form-item">内容</div>
        <textarea name="comment"></textarea><br>
        <input type="submit" name="submit">
    </form> 
    </div>
    <?php
       // DB接続設定
       $dsn = 'mysql:dbname=tb220374db;host=localhost';
       $user = 'tb-220374';
       $dbpassword = 'sSuNb6LKbg';
       $pdo = new PDO($dsn, $user, $dbpassword, 
           array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
   //データテーブル作成
       $sql = "CREATE TABLE IF NOT EXISTS request"
       ." ("
       . "id INT AUTO_INCREMENT PRIMARY KEY,"
       . "name char(32),"
       ."email2 char (32),"
       ."category char(32),"
       . "comment TEXT"
       .");";
       $stmt = $pdo->query($sql);	      

      	    //ポスト送信されたものをデータテーブルに入れる
              if(!empty($_POST["name"])&&!empty($_POST["email2"])
              &&!empty($_POST["category"])&&!empty($_POST["comment"])){
                $sql = $pdo -> prepare(
                    "INSERT INTO request (name, email, category, comment) 
                    VALUES (:name, :email, :category, :comment)");
                $sql -> bindParam(':name', $name, PDO::PARAM_STR);
                $sql -> bindParam(':email', $email2, PDO::PARAM_STR);
                $sql -> bindParam(':category', $category, PDO::PARAM_STR);
                $sql -> bindParam(':comment', $comment, 
                        PDO::PARAM_STR);
                $name = $_POST["name"];
                $email2 = $_POST["email2"];
                $category = $_POST["category"];
                $comment = $_POST["comment"];
                $sql -> execute();
                require 'src/Exception.php';
                require 'src/PHPMailer.php';
                require 'src/SMTP.php';
                require 'setting.php';
              
                // PHPMailerのインスタンス生成
    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->isSMTP(); // SMTPを使うようにメーラーを設定する
    $mail->SMTPAuth = true;
    $mail->Host = MAIL_HOST; // メインのSMTPサーバー（メールホスト名）を指定
    $mail->Username = MAIL_USERNAME; // SMTPユーザー名（メールユーザー名）
    $mail->Password = MAIL_PASSWORD; // SMTPパスワード（メールパスワード）
    $mail->SMTPSecure = MAIL_ENCRPT; // TLS暗号化を有効にし、「SSL」も受け入れます
    $mail->Port = SMTP_PORT; // 接続するTCPポート

    // メール内容設定
    $mail->CharSet = "UTF-8";
    $mail->Encoding = "base64";
    $mail->setFrom(MAIL_FROM,MAIL_FROM_NAME);
    $mail->addAddress($email2, '受信者さん'); //受信者（送信先）を追加する
//$mail->addReplyTo('xxxxxxxxxx@xxxxxxxxxx','返信先');
//    $mail->addCC('xxxxxxxxxx@xxxxxxxxxx'); // CCで追加
    $mail->addBcc('tripoita.piyopiyo@gmail.com'); // BCCで追加
    $mail->Subject = MAIL_SUBJECT; // メールタイトル
    $mail->isHTML(true);    // HTMLフォーマットの場合はコチラを設定します
    $body = 'どうも。大分の上空を3年飛び回っている🐓です。'.'<br>'.
    '（あ、ちなみに豆田町は良きですよ(*￣▽￣)ﾌﾌﾌｯ♪）'.'<br>'.
    'お問い合わせありがとうございます。後ほど私からお返事させていただきます'.'<br>'.
    '↓とりあえず旅の準備をする↓'.'<br>'.
    'https://tb-220374.tech-base.net/TRIPOITA/login.php'."<br>".
    "リクエストの内容"."<br>".
    "お名前: ".$name."<br>".
    "リクエストの種類: ".$category."<br>".
    "内容: ".$comment;

    $mail->Body  = $body; // メール本文
    // メール送信の実行
    if(!$mail->send()) {
    	echo 'メッセージは送られませんでした！';
    	echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
    	header('location:./requestsend.html');
    }
    }elseif(empty($_POST["name"])&&!empty($_POST["email2"])
    &&!empty($_POST["category"])&&!empty($_POST["comment"])){
        header('location:./requestfalse.html');
    }
    elseif(!empty($_POST["name"])&&empty($_POST["email2"])
    &&!empty($_POST["category"])&&!empty($_POST["comment"])){
        header('location:./requestfalse.html');
    }elseif(!empty($_POST["name"])&&!empty($_POST["email2"])
    &&empty($_POST["category"])&&!empty($_POST["comment"])){
        header('location:./requestfalse.html');
    }elseif(!empty($_POST["name"])&&!empty($_POST["email2"])
    &&!empty($_POST["category"])&&empty($_POST["comment"])){
        header('location:./requestfalse.html');
    }elseif(!empty($_POST["name"])&&!empty($_POST["email2"])
    &&empty($_POST["category"])&&empty($_POST["comment"])){
        header('location:./requestfalse.html');
    }elseif(empty($_POST["name"])&&empty($_POST["email2"])
    &&!empty($_POST["category"])&&!empty($_POST["comment"])){
        header('location:./requestfalse.html');
    }elseif(empty($_POST["name"])&&!empty($_POST["email2"])
    &&empty($_POST["category"])&&!empty($_POST["comment"])){
        header('location:./requestfalse.html');
    }elseif(empty($_POST["name"])&&!empty($_POST["email2"])
    &&!empty($_POST["category"])&&empty($_POST["comment"])){
        header('location:./requestfalse.html');
    }elseif(!empty($_POST["name"])&&empty($_POST["email2"])
    &&!empty($_POST["category"])&&empty($_POST["comment"])){
        header('location:./requestfalse.html');
    }elseif(!empty($_POST["name"])&&empty($_POST["email2"])
    &&empty($_POST["category"])&&!empty($_POST["comment"])){
        header('location:./requestfalse.html');
    }elseif(!empty($_POST["name"])&&empty($_POST["email2"])
    &&empty($_POST["category"])&&empty($_POST["comment"])){
        header('location:./requestfalse.html');
    }elseif(empty($_POST["name"])&&!empty($_POST["email2"])
    &&empty($_POST["category"])&&empty($_POST["comment"])){
        header('location:./requestfalse.html');
    }elseif(empty($_POST["name"])&&empty($_POST["email2"])
    &&!empty($_POST["category"])&&empty($_POST["comment"])){
        header('location:./requestfalse.html');
    }elseif(empty($_POST["name"])&&empty($_POST["email2"])
    &&empty($_POST["category"])&&!empty($_POST["comment"])){
        header('location:./requestfalse.html');
    }
 
?>
</body>
</html>

