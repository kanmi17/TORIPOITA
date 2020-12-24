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
        <h1>ログイン画面</h1>    
    <!-- メールアドレス・パスワード入力フォーム -->
    <div class = "form">
    <form action="" method="post">
        メールアドレス<br>
        <input type="text"name='email' size = 40><br>
        パスワード<br>
        <input type="text"name='password'><br>
        <input type="submit" value="ログイン">
    </form>
    </div>
        <!-- ここまでメールアドレス・パスワード入力フォーム -->
   <!-- 吹き出し -->
    <div class="balloon">
            <figure class="balloon-image-left">
              <img src="bird.jpg" alt="">
            <figcaption class="balloon-image-description">
                鳥
            </figcaption>
            </figure>
            <div class="balloon-text-right">
              <p>
                やぁ。
              </p>
            </div>
           </div>

      <!-- 吹き出しここまで -->       
    <?php
	        // DB接続設定
	        $dsn = 'mysql:dbname=tb220374db;host=localhost';
	        $user = 'tb-220374';
	        $dbpassword = 'sSuNb6LKbg';
	        $pdo = new PDO($dsn, $user, $dbpassword, 
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
                // ログインボタンが押された場合
            if(!empty($_POST['email'])or!empty($_POST['password'])){
                if (empty($_POST['email'])) {
                    echo "メールアドレスが未入力です。";
                } elseif (empty($_POST['password'])) {
                   echo "パスワードが未入力です。";
            } 
        }
            //ログインできたかの判断
            if(!empty($_POST['email'])&&!empty($_POST['password'])){
                $email = $_POST['email'];
                $password = $_POST['password'];
                $sql = 'SELECT * FROM OITATRIP WHERE name=:name AND comment=:comment';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':name', $email, PDO::PARAM_INT);
                $stmt->bindParam(':comment', $password, PDO::PARAM_INT);
                $stmt->execute();
                $results = $stmt->fetchAll();
                $stmt = null;
                $pdo = null;
                if ($results[0]!=0){
                        header('location:./request.php');
                    }else{

                        header('location:./false.html');
                    }
                }
            

    ?>
        </div>
    </body>
    </html>