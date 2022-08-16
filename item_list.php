<?php
session_save_path('/tmp/test01/session');
	session_start();
	session_regenerate_id(true);
	$_SESSION['login'];
	include_once 'common.php';
	if(empty($_SESSION['login']))
	{
        header("Location: index.php");
    }
	
        /* DB query */
        
        
        $pdo = new PDO($dsn,$db_user,$db_passwd);
		$stmt = $pdo->prepare("SELECT product_id, product, price FROM item;");
		$stmt->execute();
		$result = $stmt->fetchAll();
echo "<form method=\"POST\" action=\"cart.php\">";
echo "<table border=\"1\">";

   
	foreach($result as $i => $value)
	{
        
            echo "<tr>";
        echo "<td>" . "<input type=\"hidden\" name=\"product_id[$i]\" value=\"" .$value[0] . "\">" . $value[0] . "</td>";
        echo "<td>" . "<input type=\"hidden\" name=\"product[$i]\" value=\"" .$value[1] . "\">". $value[1] . "</td>";
        echo "<td>" . "<input type=\"hidden\" name=\"price[$i]\" value=\"" .$value[2] . "\">". $value[2] . "</td>";
        echo "<td>" . "<input type=\"checkbox\" name=\"check[$i]\">" ."check!!" . "</td>";
            echo "</tr>";
	}
echo "</table>";
echo "<input type=\"submit\" value=\"送信カートへ\">";
echo "</form>"


?>
