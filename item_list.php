<?php
//session_save_path('/tmp/test01/session');
	session_start();
	session_regenerate_id(true);
	$_SESSION['login'];
	include_once 'common.php';
	if(empty($_SESSION['login']))
	{
        header("Location: index.php");
    }
	if (isset($_GET['page'])) {
	$page = (int)$_GET['page'];
} else {
	$page = 1;
}
if ($page > 1) {
	// 例：２ページ目の場合は、『(2 × 10) - 10 = 10』
	$start = ($page * 5) - 5;
} else {
	$start = 0;
}
        /* DB query */
        
        
        $pdo = new PDO($dsn,$db_user,$db_passwd);
		$stmt = $pdo->prepare("SELECT product_id, product, price FROM item LIMIT {$start}, 5;");
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
echo "</form>";
$page_num = $pdo->prepare("
	SELECT COUNT(*) product_id
	FROM item
");
$page_num->execute();
$page_num = $page_num->fetchColumn();

// ページネーションの数を取得する
$pagination = ceil($page_num / 5);

?>

<?php for ($x=1; $x <= $pagination ; $x++) { ?>
	<a href="?page=<?php echo $x ?>"><?php echo $x; ?></a>
<?php } ?>
