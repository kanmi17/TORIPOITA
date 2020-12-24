<?php

            $dsn = 'mysql:dbname=tb220374db;host=localhost';
	        $user = 'tb-220374';
	        $dbpassword = 'sSuNb6LKbg';
	        $pdo = new PDO($dsn, $user, $dbpassword, 
	            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

                $sql ='SHOW CREATE TABLE OITATRIP';
                $result = $pdo -> query($sql);
                foreach ($result as $row){
                    echo $row[0];
                    echo $row[1];
                    echo $row[2];
                }
                echo "<hr>";

?>