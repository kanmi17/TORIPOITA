<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8"> 
        <title>mission_5.1</title>
    </head>

    <body>

    
    <?php
            $comment =$_POST["comment"];
            $name = $_POST["name"];
            //$str = string"配列" $_POST = 送信
            $edit = $_POST["edit1"];
            $edit2 = $_POST["edit2"];
            
            $delete = $_POST["delete1"];

	        // DB接続設定
	        $dsn = 'mysql:dbname=tb220374db;host=localhost';
	        $user = 'tb-220374';
	        $password = 'sSuNb6LKbg';
	        $pdo = new PDO($dsn, $user, $password, 
	            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        //4-2
	        $sql = "CREATE TABLE IF NOT EXISTS tb5"
	        ." ("
            . "id INT AUTO_INCREMENT PRIMARY KEY,"
	        . "name char(32),"
	        . "comment TEXT"
	        .");";
	        $stmt = $pdo->query($sql);	        


	        
	    //4-5
        if(!empty($comment&&$name)&&empty($edit2)){
	        $sql = $pdo -> prepare(
	            "INSERT INTO tb5 (name, comment) 
	            VALUES (:name, :comment)");
	        $sql -> bindParam(':name', $name, PDO::PARAM_STR);
	        $sql -> bindParam(':comment', $comment, 
	                PDO::PARAM_STR);
	        $sql -> execute();
        }
//bindParamの引数名（:name など）は
	        //テーブルのカラム名に併せると
	        //ミスが少なくなります。最適なものを適宜決めよう。

        if(!empty($edit)){
            $id = $edit;
            $sql = 'SELECT * FROM tb5 WHERE id=:id';
	        $stmt = $pdo->prepare($sql);
	        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $results = $stmt->fetchAll();
	        foreach ($results as $row){
		//$rowの中にはテーブルのカラム名が入る
	        $id2 = $row['id'];
		    $name2 = $row['name'];
		    $comment2 = $row['comment'];
            }
        }
	//4-7	    
        if(!empty($comment&&$name&&$edit2)){
	        $id = $edit2;
            $comment3 =$_POST["comment"];
            $name3 = $_POST["name"];
	        $sql = 'UPDATE tb5 SET name=
	                :name,comment=:comment WHERE id=:id';
	        $stmt = $pdo->prepare($sql);
	        $stmt->bindParam(':name', $name3, PDO::PARAM_STR);
	        $stmt->bindParam(':comment', $comment3, PDO::PARAM_STR);
	        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
	        $stmt->execute();
        }

	//続けて、4-6の SELECTで表示させる機能 も記述し、
	//表示もさせる。
	//※ データベース接続は上記で行っている状態なので、
	//その部分は不要
	//4-8
	    if(!empty($delete)){
	        $id = $delete;
	        $sql = 'delete from tb5 where id= :id';
	        $stmt = $pdo->prepare($sql);
	        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
	        $stmt->execute();
	    }
?>

    <form action="" method="post">
        <input type="text" name="comment" 
        value = "<?php echo $comment2; ?>"
        placeholder="テキストを入力してください">
        <input type="text" name="name" 
        value = "<?php echo $name2; ?>"
        placeholder="Your Name">
        <input type="hidden" name="edit2"
        placeholder="edit number" value = "<?php echo $id2; ?>">
        <input type="submit" name="submit">
    </form> 
    <form action="" method="post">
        <input type="number" name="delete1" 
        placeholder="delete">
        <input type="submit" name="delete2" value="delete">
    </form> 
    <form action="" method="post">
        <input type="number" name="edit1" 
        placeholder="edit">
        <input type="submit" name="edit-button" value="edit">
    </form> 
<?php
	        //4-6

	   $sql = 'SELECT * FROM tb5';
	   $stmt = $pdo->query($sql);
	   $results = $stmt->fetchAll();
	   foreach ($results as $row){
		//$rowの中にはテーブルのカラム名が入る
	        echo $row['id'].',';
		    echo $row['name'].',';
		    echo $row['comment'].'<br>';
	        echo "<hr>";
	   }

	        
	//続けて、4-6の SELECTで表示させる機能 も記述し、表示もさせる。
	//※ データベース接続は上記で行っている状態なので、その部分は不要
    ?>
    </body>
</html>