<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8"> 
        <title>hotelresist&list</title>
    </head>

<body>
<form action ="" method="post">
<input type="text" name="hotel" placeholder="hotel">
<input type="text" name="url" placeholder="URL">
<input type="text" name="adress" placeholder="adress">
<input type="submit" name="submit">
</form>
<form action="" method="post">
        <input type="number" name="delete1" 
        placeholder="delete">
        <input type="submit" name="delete2" value="delete">
</form> 

<?php

	        // DB接続設定
	        $dsn = 'mysql:dbname=tb220374db;host=localhost';
	        $user = 'tb-220374';
	        $dbpassword = 'sSuNb6LKbg';
            $pdo = new PDO($dsn, $user, $dbpassword, 
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));    
	        $sql = "CREATE TABLE IF NOT EXISTS hotellist"
	        ." ("
            . "id INT AUTO_INCREMENT PRIMARY KEY,"
	        . "hotel char(32),"
            . "url char(255),"
            . "adress char(32)"
            .");";
            
            $stmt = $pdo->query($sql);

        if(!empty($_POST["hotel"])&&!empty($_POST["url"])&&!empty($_POST["adress"])){
            $hotel =$_POST["hotel"];
            $url = $_POST["url"];
            $adress = $_POST["adress"];
            //$str = string"配列" $_POST = 送信

            $sql = $pdo -> prepare(
	            "INSERT INTO hotellist (hotel,url,adress) 
	            VALUES (:hotel, :url, :adress)");
	        $sql -> bindParam(':hotel', $hotel, PDO::PARAM_STR);
	        $sql -> bindParam(':url', $url, 
                    PDO::PARAM_STR);
            $sql -> bindParam(':adress', $adress, PDO::PARAM_STR);
            $sql -> execute();            
        }
        if(!empty($_POST["delete1"])){
	        $id = $_POST["delete1"];
	        $sql = 'delete from hotellist where id= :id';
	        $stmt = $pdo->prepare($sql);
	        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
	        $stmt->execute();
        }
        $sql = 'SELECT * FROM hotellist';
        $stmt = $pdo->query($sql);
        $results = $stmt->fetchAll();
        foreach ($results as $row){
         //$rowの中にはテーブルのカラム名が入る
             echo $row['id'].',';
             echo $row['hotel'].',';
             echo $row['url'].',';
             echo $row['adress'].'<br>';
             echo "<hr>";
        }	 

?>
</body>
</html>