<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8"> 
        <title>hotelresist&list</title>
    </head>

<body>
<form action ="" method="post">
<input type="text" name="taxi" placeholder="taxi">
<input type="text" name="tel" placeholder="tel">
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
	        $sql = "CREATE TABLE IF NOT EXISTS taxilist"
	        ." ("
            . "id INT AUTO_INCREMENT PRIMARY KEY,"
	        . "taxi char(32),"
            . "tel char(255),"
            . "adress char(32)"
            .");";
            
            $stmt = $pdo->query($sql);

        if(!empty($_POST["taxi"])&&!empty($_POST["tel"])&&!empty($_POST["adress"])){
            $taxi =$_POST["taxi"];
            $tel = $_POST["tel"];
            $adress = $_POST["adress"];
            //$str = string"配列" $_POST = 送信

            $sql = $pdo -> prepare(
	            "INSERT INTO taxilist (taxi,tel,adress) 
	            VALUES (:taxi, :tel, :adress)");
	        $sql -> bindParam(':taxi', $taxi, PDO::PARAM_STR);
	        $sql -> bindParam(':tel', $tel, 
                    PDO::PARAM_STR);
            $sql -> bindParam(':adress', $adress, PDO::PARAM_STR);
            $sql -> execute();            
        }
        if(!empty($_POST["delete1"])){
	        $id = $_POST["delete1"];
	        $sql = 'delete from taxilist where id= :id';
	        $stmt = $pdo->prepare($sql);
	        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
	        $stmt->execute();
        }
        $sql = 'SELECT * FROM taxilist';
        $stmt = $pdo->query($sql);
        $results = $stmt->fetchAll();
        foreach ($results as $row){
         //$rowの中にはテーブルのカラム名が入る
             echo $row['id'].',';
             echo $row['taxi'].',';
             echo $row['tel'].',';
             echo $row['adress'].'<br>';
             echo "<hr>";
        }	 

?>
</body>
</html>