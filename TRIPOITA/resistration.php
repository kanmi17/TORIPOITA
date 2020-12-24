<!DOCTYPE html>
<html lang="ja">
<head>
        <meta charset="UTF-8"> 
        <title>大分とりっぷ🐓</title>
        <link rel="stylesheet" href="./resistration.css">
    </head>  
    <body>
    <header>
        <div class = "header-left">
            <a href="top.html">おおいたとりっぷ🐓</a>
        </div>
    </header>
    <div class = "top-wrapper">
        <h1>早速使ってみましょう！</h1>    
    <!-- メールアドレス・パスワード登録 -->
    <div class = "form">
    <form action="" method="post">
        メールアドレス<br>
        <input type="text"name="email" size = 40><br>
        パスワード<br>
        <input type="text"name="password"><br>
        <input type="submit" value="送信">
    </form>
    </div>
    <div class="balloon">
            <figure class="balloon-image-left">
              <img src="bird.jpg" alt="">
            <figcaption class="balloon-image-description">
                鳥
            </figcaption>
            </figure>
            <div class="balloon-text-right">
              <p>
                あなたの旅の相談相手になれたらいいな。
              </p>
            </div>
           </div>
</div>       
    <?php   
          
	        // DB接続設定
	        $dsn = 'mysql:dbname=tb220374db;host=localhost';
	        $user = 'tb-220374';
	        $dbpassword = 'sSuNb6LKbg';
	        $pdo = new PDO($dsn, $user, $dbpassword, 
	            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        //データテーブル作成
	        $sql = "CREATE TABLE IF NOT EXISTS OITATRIP"
	        ." ("
            . "id INT AUTO_INCREMENT PRIMARY KEY,"
	        . "name char(32),"
	        . "comment TEXT"
	        .");";
	        $stmt = $pdo->query($sql);	        
	    //ポスト送信されたものをデータテーブルに入れる
        if(!empty($_POST['email'])&&!empty($_POST['password'])){
	        $sql = $pdo -> prepare(
	            "INSERT INTO OITATRIP (name, comment) 
	            VALUES (:name, :comment)");
	        $sql -> bindParam(':name', $email, PDO::PARAM_STR);
	        $sql -> bindParam(':comment', $password, 
                    PDO::PARAM_STR);
            $email = $_POST["email"];
            $password = $_POST["password"];
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
    $mail->addAddress($email, '受信者さん'); //受信者（送信先）を追加する
//$mail->addReplyTo('xxxxxxxxxx@xxxxxxxxxx','返信先');
//    $mail->addCC('xxxxxxxxxx@xxxxxxxxxx'); // CCで追加
//    $mail->addBcc('xxxxxxxxxx@xxxxxxxxxx'); // BCCで追加
    $mail->Subject = MAIL_SUBJECT; // メールタイトル
    $mail->isHTML(true);    // HTMLフォーマットの場合はコチラを設定します
    $body = 'どうも。大分の上空を3年飛び回っている🐓です。'.'<br>'.
    '（あ、ちなみ大分名物はとり天ですよ(*￣▽￣)ﾌﾌﾌｯ♪）'.'<br>'.
    'そうそう。あなたの旅の準備の第一歩が完了しました。早速、大分とりっぷ🐓で楽しんでください。'.'<br>'.
    '↓早速旅の準備をする↓'.'<br>'.
    'https://tb-220374.tech-base.net/TRIPOITA/login.php';

    $mail->Body  = $body; // メール本文
    // メール送信の実行
    if(!$mail->send()) {
    	echo 'メッセージは送られませんでした！';
    	echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
    	header('location:./successful.html');
    }
    }
    if(empty($_POST['email'])&&!empty($_POST['password'])){
            echo "メールアドレスが未入力です。";
        } elseif (empty($_POST['password'])&&!empty($_POST['email'])) {
            echo "パスワードが未入力です。";
        } 
?>

</body>
</html>