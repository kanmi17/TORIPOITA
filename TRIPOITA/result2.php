<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>大分とりっぷ🐓</title>
    <link rel="stylesheet" href="./ZIGOKU1.css">
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
        <h1>大分空港―地獄―貴船城―別府タワー―竹瓦温泉（普通浴のみ）</h1>
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
            <a>金額：4040円<br>
            時間：5時間15分<br>
            アトラクション数：8件</a>
            </div>
        <div class="clearfix">
        <div class="content">
        <ul class="wrapper">
            <li class="fadeInUp">大分空港<hr></li>
            <li class="fadeInUp">↓（高速バスで45分1500円)</li>
            <li class="fadeInUp">別府北浜（高速バス）<hr></li>
            <li class="fadeInUp">↓</li>
            <li class="fadeInUp">別府北浜（亀の井バス）<hr></li>
            <li class="fadeInUp">↓（バスで21分390円）</li>
            <li class="fadeInUp">海地獄前<hr></li>
            <li class="fadeInUp">↓徒歩5分</li>
            <li class="fadeInUp"><a href="https://goo.gl/maps/4rwRbWF9DftmbC2H9" target="_blank" rel="noopener">
                海地獄（10分滞在　地獄めぐりチケット2000円）</a><hr></li>
            <li class="fadeInUp">↓徒歩5分</li>
            <li class="fadeInUp"><a href="https://goo.gl/maps/nj41S4VT3pcAS5R69" target="_blank" rel="noopener">
                鬼石坊主地獄（10分滞在）</a><hr></li>
            <li class="fadeInUp">↓</li>
            <li class="fadeInUp"><a href="https://goo.gl/maps/xRkkCMNRH2JkGUeTA" target="_blank" rel="noopener">
                かまど地獄（10分滞在）</a><hr></li>
            <li class="fadeInUp">↓</li>
            <li class="fadeInUp"><a href="https://goo.gl/maps/yaWNdKBJrpZkwB3c8" target="_blank" rel="noopener">
                白池地獄（10分滞在）</a><hr></li>
            <li class="fadeInUp">↓徒歩10分</li>
            <li class="fadeInUp"><a href="https://goo.gl/maps/WGWTdosNqRP8zCxN7" target="_blank" rel="noopener">
                貴船城（30分滞在　入場料300円）</a><hr></li>
            <li class="fadeInUp">↓徒歩5分</li>
            <li class="fadeInUp">鉄輪口（亀の井バス）<hr></li>
            <li class="fadeInUp">↓（バスで15分340円）</li>
            <li class="fadeInUp">別府北浜（亀の井バス）<hr></li>
            <li class="fadeInUp">↓徒歩5分</li>
            <li class="fadeInUp"><a href="https://goo.gl/maps/eeAeGBYgcmxaCHDv5" target="_blank" rel="noopener">
                別府タワーで別府の外観を展望（30分滞在　入場料300円）</a><hr></li>
            <li class="fadeInUp">↓徒歩10分</li>
            <li class="fadeInUp"><a href="https://goo.gl/maps/HsLWYhNYZj79JkjZ9" target="_blank" rel="noopener">
                竹瓦温泉で温泉、砂湯に浸かる（1時間30分　普通浴110円　砂湯1050円）</a><hr></li>

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
            　　<tr><th><h3>別府市内のホテル</h3></th></tr>
            <?php
            $dsn = 'mysql:dbname=tb220374db;host=localhost';
              $user = 'tb-220374';
              $dbpassword = 'sSuNb6LKbg';
              $pdo = new PDO($dsn, $user, $dbpassword, 
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
                $sql = 'SELECT * FROM hotellist WHERE adress LIKE "%別府%"';
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
            　　<tr><th><h3>別府市内のタクシー会社</h3></th></tr>
            <?php
            $dsn = 'mysql:dbname=tb220374db;host=localhost';
              $user = 'tb-220374';
              $dbpassword = 'sSuNb6LKbg';
              $pdo = new PDO($dsn, $user, $dbpassword, 
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
                $sql = 'SELECT * FROM taxilist WHERE adress LIKE "%別府%"';
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
                            <p>「大分空港の和食店なな瀬のりゅうきゅう丼…<br>
                                食べたら大分にまた行きたくなりますね…(￣ー￣)ﾆﾔﾘ」</p>
                        </div>
                       </div><br>
    </footer>