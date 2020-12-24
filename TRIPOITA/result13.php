<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>大分とりっぷ🐓</title>
    <link rel="stylesheet" href="./YUHU.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="result1.js"></script>
  </head>
  <body>
    <!-- ここにコードを書いていきましょう -->
    <header>
        <div class = "header-left">
            <a href="top.html">おおいたとりっぷ🐓</a>
        </div>
        <div class = "header-right">
            <a href = "TRIPOITA-1.html">出発地点検索へ戻る</a>          
        </div>
    </header>
    <div class ="top-wrapper">
        <h1>大分駅―湯布院散策</h1>
    </div>
     <!-- 吹き出し-->
    <div class="balloon">
        <figure class="balloon-image-left">
          <img src="bird.jpg" alt="">
        <figcaption class="balloon-image-description">
            鳥
        </figcaption>
        </figure>
        <div class="balloon-text-right">
          <p>
            アトラクション名をクリックすると、GoogleMapが開きます。
          </p>
        </div>
       </div>

       <div class = "detail">
        <a>金額：950円（交通費のみ）<br>
        時間：3時間30分<br>
        アトラクション数：3件orそれ以上</a>
        </div>

        <div class="clearfix">
          <div class="content">
        <ul class="wrapper">
            <li class="fadeInUp">大分駅<hr></li>
            <li class="fadeInUp">↓（電車で72分950円）</li>
            <li class="fadeInUp">由布院駅<hr></li>
            <li class="fadeInUp">↓</li>
            <li class="fadeInUp"><a href="https://goo.gl/maps/wnHRGbCarHTYTCpn6" target="_blank" rel="noopener">
                湯布院散策</a><hr><p>湯の坪街道、フローラルビレッジ、亀の井別荘、金鱗湖、佛山寺etc..</p></li>
        </ul></div>
        <div  id = "Beppu">
          <aside>
          <div class="form-item">該当地域内のホテルとタクシー会社を探す</div>
          <form action="" method="post">
        <select name="category">
        <option value="未選択">選択してください</option>
        <option value="hotel">ホテル</option>
        <option value="taxi">タクシー</option>
        </select>
        <input type="submit" value="検索">
          </form>
          <?php
            if(!empty($_POST['category'])){
              $category = $_POST['category'];
              if($category=='hotel'){
                ?>
          <table border="1">
          　　<tr><th><h3>由布市内のホテル</h3></th></tr>
          <?php
          $dsn = 'mysql:dbname=tb220374db;host=localhost';
            $user = 'tb-220374';
            $dbpassword = 'sSuNb6LKbg';
            $pdo = new PDO($dsn, $user, $dbpassword, 
              array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
              $sql = 'SELECT * FROM hotellist WHERE adress LIKE "%由布%"';
              $stmt = $pdo->query($sql);
              $results = $stmt->fetchAll();
              foreach ($results as $row){
          ?>    
            <tr><td><a href="<?php echo $row['url']?>"><?php echo $row['hotel']?></a></td></tr>
            <?php
          //end of foreach
              }
              //end of "if/hotel"
            }
            elseif($category=='taxi'){
        ?>   
          </table>
          <table border="1">
          　　<tr><th><h3>由布市内のタクシー会社</h3></th></tr>
          <?php
          $dsn = 'mysql:dbname=tb220374db;host=localhost';
            $user = 'tb-220374';
            $dbpassword = 'sSuNb6LKbg';
            $pdo = new PDO($dsn, $user, $dbpassword, 
              array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
              $sql = 'SELECT * FROM taxilist WHERE adress LIKE "%由布%"';
              $stmt = $pdo->query($sql);
              $results = $stmt->fetchAll();
              foreach ($results as $row){
          ?>    
            <tr><td><a href="tel:<?php echo $row['tel']?>"><?php echo $row['taxi']?></a></td></tr>
            <?php
          //end of foreach
              }
              //end of "if/taxi"
            }
          }    
          ?>     
          </table>
          </aside>
        </div>
      </div>
          <div id="page_top"><a href="#">TOP</a></div>
    <footer><p>🐓からの金言</p>
      <!-- 吹き出し-->
      <div class="balloon">
        <figure class="balloon-image-left">
          <img src="bird.jpg" alt="">
        <figcaption class="balloon-image-description">
            鳥
        </figcaption>
        </figure>
        <div class="balloon-text-right">
          <p>「この行程表はあなたの希望に基づいた私からの提案です。<br>
            あなたらしいアレンジを施して、あなたの心に一生残る旅を楽しんでください。<br>
            …僕の金言を他の提案ページに残しました。是非、探してみてください(￣ー￣)ﾆﾔﾘ」</p>
        </div>
       </div><br>
    </footer>